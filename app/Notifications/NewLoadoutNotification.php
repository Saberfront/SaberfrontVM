<?php

namespace Saberfront\Notifications;

use Illuminate\Bus\Queueable;
use NotificationChannels\Webhook\WebhookChannel;
use NotificationChannels\Webhook\WebhookMessage;
use Illuminate\Notifications\Notification;
class NewLoadoutNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($loadout)
    {
        $this->loadout = $loadout;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [WebhookChannel::class];
    }

    /**
     * Get the Discord representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return NotificationChannels\Discord\DiscordMessage
     */
    public function toDiscord($notifiable)
    {

        return WebhookMessage::create()
            ->data([
               'payload_json' => [
                   'content' => "A new loadout is available for all on Saberfront Live: **" . $this->loadout->loadout_name. "**!"
               ]
            ])
            ->userAgent("SaberfrontVm/DB2 1.0");

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
