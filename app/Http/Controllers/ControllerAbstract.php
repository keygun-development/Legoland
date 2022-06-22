<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

abstract class ControllerAbstract
{
    abstract static protected function update(Request $request);

    abstract static protected function new(Request $request);

    abstract static protected function delete(Request $request, $id);
}
