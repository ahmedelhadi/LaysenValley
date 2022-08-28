<?php

namespace App\Notifications\Order;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class Created extends Notification
{
    private $order;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($order)
    {
        $this->order = $order;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        if (env('APP_ENV') == 'production') {
            return ['mail','database'];
            //return explode(',', $notifiable->notification_preference);

        } else {
            return ['mail','database'];
        }

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
                    ->subject(__('notification.OrderCreated'))
                    ->line(__('notification.OrderCreated',['name' => $this->order->name  ]))
                    ->action(__('notification.click_here'), route('admin.orders.show',$this->order->id))
                    ->line(__('notification.OrderCreated'));
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toDatabase($notifiable)
    {

        return [
            'action'=> 'create',
            'model'=> 'orders',
            'model_id'=> $this->order->id,
            'title'=>__('notification.OrderCreated'),
            'desc'=>__('notification.OrderCreatedDesc'),
            'url' => route('admin.orders.show',$this->order->id)
        ];
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
            'order_id' => $this->order->id,
        ];
    }

    public function toBroadcast($notifiable)
    {

    }

}
