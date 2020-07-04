<?php
namespace App\Notifications;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
class PasswordResetRequest extends Notification implements ShouldQueue
{
    use Queueable;
    protected $token;

    public function __construct($token)
    {
        $this->token = $token;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
            $url = url('/find/'.$this->token);
        return (new MailMessage)
            ->line('You are receiving this email because we received a password reset request for your account.'.$url)
            ->action('Reset Password', url($url))
            ->line('If you did not request a password reset, no further action is required.');
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }

}