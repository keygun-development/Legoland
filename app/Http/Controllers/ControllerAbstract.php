<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

abstract class ControllerAbstract
{
    abstract static public function update(Request $request);

    abstract static public function new(Request $request);

    abstract static public function delete(Request $request, $id);
}
