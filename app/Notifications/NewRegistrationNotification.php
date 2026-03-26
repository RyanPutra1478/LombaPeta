<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use App\Models\Registration;

class NewRegistrationNotification extends Notification
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
            'participant_name' => $this->registration->user->name,
            'type' => 'new_registration',
            'message' => "Pendaftar baru di {$this->registration->competition->title}: {$this->registration->user->name}",
            'url' => route('penyelenggara.competition.registrants', $this->registration->competition_id)
        ];
    }
}
