<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends ControllerAbstract
{
    public static function update(Request $request)
    {
        if (!$request->filled('name') || !$request->filled('description') || !$request->filled('price')) {
            return redirect('/admin/tickets')->with('error', 'Niet alle velden zijn ingevuld');
        } else {
            $ticket = Ticket::where('id', $request->input('id'));
            $ticket->update([
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price
            ]);
            return redirect('/admin/tickets')->with('success', 'Ticket is succesvol geupdatet');
        }
    }

    public static function new(Request $request)
    {
        if (!$request->filled('name') || !$request->filled('description') || !$request->filled('price')) {
            return redirect('/admin/tickets')->with('error', 'Niet alle velden zijn ingevuld');
        } else {
            $ticket = new Ticket();
            $ticket->name = $request->name;
            $ticket->description = $request->description;
            $ticket->price = $request->price;
            $ticket->save();
            return redirect('/admin/tickets')->with('success', 'Ticket is succesvol aangemaakt');
        }
    }

    public static function delete(Request $request, $id)
    {
        $ticket = Ticket::where('id', $id);
        $ticket->delete();
        return redirect('/admin/tickets')->with('success', 'Ticket is succesvol verwijderd');
    }
}
