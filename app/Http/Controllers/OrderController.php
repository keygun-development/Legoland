<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends ControllerAbstract
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

    static public function update(Request $request)
    {
        if (!$request->filled('name') ||
            !$request->filled('email') ||
            !$request->filled('price')
        )
        {
            return redirect('/admin/bestellingen')->with('error', 'Niet alle velden zijn ingevuld');
        } else {
            $order = Order::where('id', $request->input('id'));
            $order->update([
                'name' => $request->name,
                'email' => $request->email,
                'price' => $request->price
            ]);
            return redirect('/admin/bestellingen')->with('success', 'Bestelling is succesvol geupdatet');
        }
    }

    static public function new(Request $request)
    {
        if (!$request->filled('name') || !$request->filled('email') || !$request->filled('price')) {
            return redirect('/admin/bestellingen')->with('error', 'Niet alle velden zijn ingevuld');
        } else {
            $order = new Order();
            $order->name = $request->name;
            $order->email = $request->email;
            $order->price = $request->price;
            $order->save();
            return redirect('/admin/bestellingen')->with('success', 'Bestelling is succesvol aangemaakt');
        }
    }

    static public function delete(Request $request, $id)
    {
        $ticket = Order::where('id', $id);
        $ticket->delete();
        return redirect('/admin/bestellingen')->with('success', 'Bestelling is succesvol verwijderd');
    }
}
