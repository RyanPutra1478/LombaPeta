<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use App\Models\Competition;

class NewCompetitionNotification extends Notification
{
    use Queueable;

    protected $competition;

    public function __construct(Competition $competition)
    {
        $this->competition = $competition;
    }

    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toArray(object $notifiable): array
    {
        return [
            'competition_id' => $this->competition->id,
            'title' => $this->competition->title,
            'organizer_name' => $this->competition->user->name,
            'type' => 'new_competition',
            'message' => "Lomba baru perlu verifikasi: {$this->competition->title}",
            'url' => route('admin.verifikasi')
        ];
    }
}
