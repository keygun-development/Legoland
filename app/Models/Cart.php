<?php

namespace App\Models;

use App\Models\Accommodation;
use App\Models\Ticket;

class Cart
{
    public function getSelectedProducts(): ?array
    {
        if(isset($_COOKIE['producten'])) {
            $getproducts = json_decode($_COOKIE['producten']);
            $products = [];
            foreach ($getproducts as $product) {
                if ($product->type === Ticket::getType()) {
                    array_push($products, Ticket::find($product->id));
                } else {
                    array_push($products, Accommodation::find($product->id));
                }
            }
            return $products;
        } else {
            return null;
        }
    }

    public function getProductAmounts(): ?array
    {
        if(isset($_COOKIE['producten'])) {
            $getproducts = json_decode($_COOKIE['producten']);
            $products = [];
            foreach ($getproducts as $product) {
                array_push($products, $product->amount);
            }
            return $products;
        } else {
            return null;
        }
    }
}
