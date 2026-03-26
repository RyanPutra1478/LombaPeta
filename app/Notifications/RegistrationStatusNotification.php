<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use App\Models\Registration;

class RegistrationStatusNotification extends Notification
{
    use Queueable;

    protected $registration;

    public function __construct(Registration $registration)
    {
        $this->registration = $registration;
    }

    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toArray(object $notifiable): array
    {
        $statusLabel = $this->registration->status === 'approved' ? 'DISETUJUI' : 'DITOLAK';
        $message = "Pendaftaran Anda pada lomba '{$this->registration->competition->title}' telah {$statusLabel}.";
        
        if ($this->registration->status === 'approved' && $this->registration->group_link) {
            $message .= " Silakan bergabung ke grup koordinasi.";
        }

        return [
            'registration_id' => $this->registration->id,
            'competition_title' => $this->registration->competition->title,
            'status' => $this->registration->status,
            'type' => 'registration_status',
            'message' => $message,
            'url' => route('peserta.profil') // Redirect to participant profile where registrations are listed
        ];
    }
}
