<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Mollie\Api\MollieApiClient;

class MollieWebhookController extends Controller
{
    public function checkout(Request $request)
    {
        $mollie = new MollieApiClient();
        $mollie->setApiKey(env("MOLLIE_KEY"));
        $orderId = time();
        $payment = $mollie->payments->create([
            "amount" => [
                "currency" => "EUR",
                "value" => $request->price // You must send the correct number of decimals, thus we enforce the use of strings
            ],
            "description" => "Order ".$orderId,
            "redirectUrl" => "https://".$_SERVER['HTTP_HOST']."/order?order_id=".$orderId,
            "webhookUrl" => route("/payments/webhook/"),
            "metadata" => [
                "order_id" => $orderId,
            ],
        ]);

        $newOrder = new Order();
        $newOrder->name = $request->name;
        $newOrder->email = $request->email;
        $newOrder->tickets = $_COOKIE['tickets'];
        $newOrder->price = $request->price;
        $newOrder->save();

        return redirect()->away($payment->getCheckoutUrl());
    }

    public function handle() {
        $mollie = new MollieApiClient();
        $mollie->setApiKey(env("MOLLIE_KEY"));
        $payments = $mollie->payments->page();
        setcookie('tickets', false);
        return $payments[0];
    }
}
