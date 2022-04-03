<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mollie\Laravel\Facades\Mollie;

class MollieWebhookController extends Controller
{
    public function  __construct() {
        Mollie::api()->setApiKey(env("MOLLIE_KEY")); // your mollie test api key
    }

    public function checkout(Request $request)
    {
        $orderId = time();
        $payment = Mollie::api()->payments->create([
            "amount" => [
                "currency" => "EUR",
                "value" => $request->price
            ],
            "description" => "Bestelling: ".$orderId,
            "redirectUrl" => route('payment.success'),
            "webhookUrl"  => route('/webhooks/mollie'),
            "metadata" => [
                "order_id" => $orderId,
            ],
        ]);

        return redirect()->away($payment->getCheckoutUrl());
    }

    public function handle(Request $request) {
        $paymentId = $request->input('id');
        $payment = Mollie::api()->payments->get($paymentId, ['testmode'=>'true']);

        if ($payment->isPaid())
        {
            echo 'Payment received.';
        }
    }
}
