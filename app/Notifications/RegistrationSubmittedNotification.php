<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use App\Models\Registration;

class RegistrationSubmittedNotification extends Notification
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
        return [
            'registration_id' => $this->registration->id,
            'competition_title' => $this->registration->competition->title,
            'type' => 'registration_submitted',
            'message' => "Pendaftaran Anda di '{$this->registration->competition->title}' telah berhasil dikirim. Menunggu verifikasi penyelenggara.",
            'url' => route('peserta.profil')
        ];
    }
}
