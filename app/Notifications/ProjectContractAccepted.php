<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\BroadcastMessage;

class ProjectContractAccepted extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * The project that has a notification.
     * @var App\Project
     */
    protected $project;
    /**
     * The user ID of the person that accepted the contract.
     * @var Integer
     */
    protected $userAcceptedId;
    /**
     * The project history
     * @var array
     */
    protected $history;

    
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($project, $userAcceptedId, $history)
    {
        $this->queue = 'notifications';
        $this->project = $project;
        $this->userAcceptedId = $userAcceptedId;
        $this->history = $history;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['broadcast'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the broadcastable representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return BroadcastMessage
     */
    public function toBroadcast()
    {
        return (new BroadcastMessage([
            'data' => [
                'project' => $this->project,
                'userAcceptedId' => $this->userAcceptedId,
                'history' => $this->history,
            ]
        ]))->onQueue('real-time-events');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
