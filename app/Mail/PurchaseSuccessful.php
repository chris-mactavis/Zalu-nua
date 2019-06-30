<?php

namespace App\Mail;

use App\Order;
use App\OrderDetail;
use App\Product;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PurchaseSuccessful extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $order, $order_details;
    public function __construct(Order $order)
    {
        $this->order = $order;
        $this->order_details = OrderDetail::where('order_id', $order->order_id)->get()->map(function($x) {
            $x->product = Product::find($x->product_id);
            return $x;
        });
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mails.purchase_successful');
    }
}
