<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Repositories\OrderRepository;

class EmailOrder extends Mailable
{
    use Queueable, SerializesModels;

    /** @var  OrderRepository */
    private $orderRepository;

    public $subject = 'Notificación de pedido';
    public $order;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $order, OrderRepository $orderRepo)
    {
        //
        $this->order = $order;
        $this->orderRepository = $orderRepo;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $order = $this->orderRepository->findWithoutFail($this->order->id);
        $subtotal = 0;

        foreach ($order->foodOrders as $foodOrder) {
            foreach ($foodOrder->extras as $extra) {
                $foodOrder->price += $extra->price;
            }
            $subtotal += $foodOrder->price * $foodOrder->quantity;
        }

        $total = $subtotal + $order['delivery_fee'];
        $taxAmount = $total * $order['tax'] / 100;
        $total += $taxAmount;
        return $this->markdown('emails.order', ["order" => $order, "total" => $total, "subtotal" => $subtotal,"taxAmount" => $taxAmount]);
    }
}
