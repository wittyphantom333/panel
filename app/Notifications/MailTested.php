<?php

namespace Pteranodon\Notifications;

use Pteranodon\Models\User;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class MailTested extends Notification
{
    public function __construct(private User $user)
    {
    }

    public function via(): array
    {
        return ['mail'];
    }

    public function toMail(): MailMessage
    {
        return (new MailMessage())
            ->subject('Pteranodon Test Message')
            ->greeting('Hello ' . $this->user->username . '!')
            ->line('This is a test of the Pteranodon mail system. You\'re good to go!');
    }
}
