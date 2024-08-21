<?php

namespace App\Notifications;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Support\Facades\Log;

class DeadlineMissedNotification extends Notification implements ShouldQueue
{
    use Queueable;
    protected $assignment;
    /**
     * Create a new notification instance.
     */
    public function __construct($assignment)
    {
        $this->assignment = $assignment;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }


    public function toDatabase($notifiable): array
    {
        Log::info('toDatabase method called for assignment: ' . $this->assignment->id);
        return [
            'assignment_id' => $this->assignment->id,
            'assignment_name' => $this->assignment->classAssignment->assignment->name, // Verondersteld dat de relatie bestaat
            'duedate' => Carbon::parse($this->assignment->duedate)->format('d-m-Y H:i'),
            'status' => $this->assignment->assignmentStatus->name, // Verondersteld dat de relatie bestaat
            'message' => 'Je hebt een deadline gemist:'
        ];
    }
}
