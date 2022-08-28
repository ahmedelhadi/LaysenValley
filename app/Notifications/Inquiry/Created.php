<?php

namespace App\Notifications\Inquiry;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class Created extends Notification
{
    private $inquiry;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($inquiry)
    {
        $this->inquiry = $inquiry;
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
                    ->subject(__('notification.InquiryCreated'))
                    ->line(__('notification.InquiryCreated',['name' => $this->inquiry->fname .' '. $this->inquiry->lname  ]))
                    ->line(__('notification.email',['email' => $this->inquiry->email ]))
                    ->line(__('notification.phone',['phone' => $this->inquiry->phone ]))
                    ->line(__('notification.body',['body' => $this->inquiry->body ]))
                    ->action(__('notification.click_here'), route('admin.inquiries.show',$this->inquiry->id))
                    ->line(__('notification.InquiryCreatedDesc'));
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
            'model'=> 'inquiries',
            'model_id'=> $this->inquiry->id,
            'title'=>__('notification.InquiryCreated'),
            'desc'=>__('notification.InquiryCreatedDesc'),
            'url' => route('admin.inquiries.show',$this->inquiry->id)
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
            'inquiry_id' => $this->inquiry->id,
        ];
    }

    public function toBroadcast($notifiable)
    {

    }

}
