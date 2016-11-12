<?php

namespace App\Base\Auth;

use Illuminate\Auth\Notifications\ResetPassword as BaseResetPassword;
use Illuminate\Notifications\Messages\MailMessage;

class ResetPassword extends BaseResetPassword
{
    /**
     * Get the notification's channels.
     *
     * @param  mixed  $notifiable
     * @return array|string
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Build the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject(trans('auth.password.email.action'))
            ->greeting(trans('auth.password.email.introduction'))
            ->line(trans('auth.password.email.content'))
            ->action(trans('auth.password.email.action'), route('password.reset.token', ['token' => $this->token]))
            ->line(trans('auth.password.email.conclusion'));
    }
}
