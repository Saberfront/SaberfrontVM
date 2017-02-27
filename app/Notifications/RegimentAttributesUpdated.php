<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class RegimentAttributesUpdated extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($regimentAttributes)
    {
        $this->regimentAttributes = $regimentAttributes;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
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
                    ->line('Your regiment\'s attributes have been updated. ')
                    ->action('Notification Action', route('regimentAttributes.show',[$this->regimentAttributes]))
                    ->line('Your regiment attributes have been saved.');
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
            'attributes' => $this-regimentAttributes
        ];
    }

    public function toDatabase($notifiable){
        return [
           'userId' => $this->regimentAttributes
        ];
    }
}
