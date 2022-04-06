<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class orderOperations extends Notification implements ShouldQueue
{
    use Queueable;
    private $OrderData;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($OrderData)
    {
        $this->OrderData=$OrderData;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail','database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    // 'arrival_time'=>$delivery['arrival'],
    // 'departure_time'=>$delivery['departure_time']

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line($this->OrderData['Hello'].' '.$this->OrderData['username'])
                    ->line($this->OrderData['orderText'].' '. $this->OrderData['arrival'])
                    ->line($this->OrderData['total_msg'].' '. $this->OrderData['total'])
                    ->line($this->OrderData['Thankyou'].' '. $this->OrderData['order_id']);
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
           'user_name'=>$this->OrderData['username'],
           'user_id'=>$this->OrderData['id'],
           'message'=>$this->OrderData['orderText'],
           'order_id'=>$this->OrderData['order_id'],
           'arrival'=>$this->OrderData['arrival'],
           'total_msg'=>$this->OrderData['total_msg'],
           'total'=>$this->OrderData['total']

        ];
    }
}
