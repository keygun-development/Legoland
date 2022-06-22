<?php

namespace App\Http\Controllers;

use App\Models\Accommodation;
use Illuminate\Http\Request;

class AccommodationController extends ControllerAbstract
{
    public static function update(Request $request)
    {
        if (!$request->filled('name') || !$request->filled('description') || !$request->filled('imageUrl') || !$request->filled('price')) {
            return redirect('/admin/accommodaties')->with('error', 'Niet alle velden zijn ingevuld');
        } else {
            $attraction = Accommodation::where('id', $request->input('id'));
            $attraction->update([
                'name' => $request->name,
                'description' => $request->description,
                'imageUrl' => $request->imageUrl,
                'price' => $request->price
            ]);
            return redirect('/admin/accommodaties')->with('success', 'Accommodatie is succesvol geupdatet');
        }
    }

    public static function new(Request $request)
    {
        if (!$request->filled('name') || !$request->filled('description') || !$request->filled('imageUrl') || !$request->filled('price')) {
            return redirect('/admin/accommodaties')->with('error', 'Niet alle velden zijn ingevuld');
        } else {
            $attraction = new Attraction();
            $attraction->name = $request->name;
            $attraction->description = $request->description;
            $attraction->imageUrl = $request->imageUrl;
            $attraction->price = $request->price;
            $attraction->save();
            return redirect('/admin/accommodaties')->with('success', 'Accommodatie is succesvol aangemaakt');
        }
    }

    public static function delete(Request $request, $id)
    {
        $attraction = Accommodation::where('id', $id);
        $attraction->delete();
        return redirect('/admin/accommodaties')->with('success', 'Accommodatie is succesvol verwijderd');
    }
}
