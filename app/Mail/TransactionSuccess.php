<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TransactionSuccess extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    private $transactions;
    private $name;
    private $phone;
    private $address;
    private $tranID;
    private $tranDate;
    public function __construct($transactions,$name,$phone,$address,$tranID,$tranDate)
    {
        $this->transactions = $transactions;
        $this->name = $name;
        $this->phone = $phone;
        $this->address = $address;
        $this->tranID = $tranID;
        $this->tranDate = $tranDate;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.sendmail')
        ->subject('Xác nhận đơn hàng')
        ->with([
            'carts' => session()->get('cart'),
            'transactions' => $this->transactions,
            'name' => $this->name,
            'phone' => $this->phone,
            'address' => $this->address,
            'tranID' => $this->tranID,
            'tranDate' => $this->tranDate
            ]);
    }
}
