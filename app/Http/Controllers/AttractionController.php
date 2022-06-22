<?php

namespace App\Http\Controllers;

use App\Models\Attraction;
use Illuminate\Http\Request;

class AttractionController extends ControllerAbstract
{
    public static function update(Request $request)
    {
        if (!$request->filled('name') || !$request->filled('description') || !$request->filled('imageUrl')) {
            return redirect('/admin/attracties')->with('error', 'Niet alle velden zijn ingevuld');
        } else {
            $attraction = Attraction::where('id', $request->input('id'));
            $attraction->update([
                'name' => $request->name,
                'description' => $request->description,
                'imageUrl' => $request->imageUrl
            ]);
            return redirect('/admin/attracties')->with('success', 'Attractie is succesvol geupdatet');
        }
    }

    public static function new(Request $request)
    {
        if (!$request->filled('name') || !$request->filled('description') || !$request->filled('imageUrl')) {
            return redirect('/admin/attracties')->with('error', 'Niet alle velden zijn ingevuld');
        } else {
            $attraction = new Attraction();
            $attraction->name = $request->name;
            $attraction->description = $request->description;
            $attraction->imageUrl = $request->imageUrl;
            $attraction->save();
            return redirect('/admin/attracties')->with('success', 'Attractie is succesvol aangemaakt');
        }
    }

    public static function delete(Request $request, $id)
    {
        $attraction = Attraction::where('id', $id);
        $attraction->delete();
        return redirect('/admin/attracties')->with('success', 'Attractie is succesvol verwijderd');
    }
}
