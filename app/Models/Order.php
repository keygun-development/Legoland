<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin Builder
 */
class Order extends ModelAbstract
{
    use HasFactory;

    public function getModelFromOrder(Order $order): array
    {
        $products = [];
        foreach (json_decode($order->tickets) as $product)
        {
            if ($product->type === Ticket::getType()) {
                array_push($products, Ticket::find($product->id));
            } else {
                array_push($products, Accommodation::find($product->id));
            }
        }
        return $products;
    }

    public static function getType(): string
    {
        return 'order';
    }

    static public function resolveUrl(): string
    {
        return 'bestellingen';
    }
}
