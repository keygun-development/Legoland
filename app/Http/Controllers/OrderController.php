<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function getUserOrders(): ?array
    {
        $orders = (new \App\Models\Order)->where("user_id", Auth::id())->get()->all();
        if (count($orders) > 0) {
            return $orders;
        } else {
            return null;
        }
    }
}
