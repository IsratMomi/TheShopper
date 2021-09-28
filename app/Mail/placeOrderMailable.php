<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class placeOrderMailable extends Mailable
{
    use Queueable, SerializesModels;
    public $order_data;
    public $cart_data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order_data,$cart_data)
    {
        $this->order_data = $order_data;
        $this->cart_data = $cart_data;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = "Thank you for purchasing";
        return $this->view('emails.order')
        ->subject($subject)
        ;
    }
}
