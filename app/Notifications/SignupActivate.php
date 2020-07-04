<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SignupActivate extends Notification
{
    use Queueable;


    public function __construct()
    {
        //
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        $url = url('/register/activate/'.$notifiable->activation_token);
        return (new MailMessage)
            ->subject('Confirm your account')
            ->line('Thank you for using flex platform! Before you begin, you must confirm your account.')
            ->action('Confirm Account', url($url))
            ->line('Thank you for using our application!');
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
