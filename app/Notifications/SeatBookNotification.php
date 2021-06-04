<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Auth;

class SeatBookNotification extends Notification implements ShouldQueue
{
    use Queueable;
    private $seatBookDetails;

    public function __construct($details)
    {
        $this->seatBookDetails = $details;
    }

    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->greeting('Hi ' . $this->seatBookDetails['name'])
            ->line($this->seatBookDetails['body'])
            ->action($this->seatBookDetails['detail'], $this->seatBookDetails['detailUrl'])
            ->line($this->seatBookDetails['thanks']);
    }

    public function toArray($notifiable)
    {
        return [
            'movie_id' => $this->seatBookDetails['movie_id']
        ];
    }
}
