<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Order;

class OrderStatusMail extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public $status;

    // Pass the order and the new status to the mail
    public function __construct($order, $status)
    {
        $this->order = $order;
        $this->status = $status;
    }

    public function build()
    {
        return $this->subject('Order Update: ' . $this->status)
                    ->view('emails.order_status');
    }
}