<?php

namespace App\Http\Controllers;

use App\Models\Fridge;
use Illuminate\Http\Request;

class FridgeController extends Controller
{
    public function switchFridge() {
        $elem = Fridge::find(1)->first();
        if ($elem->isOpen == "X")
            {$elem->isOpen = "O";
            $elem->save();
            return back()->with('message', 'Fridge is open');}
        else
            {$elem->isOpen = "X";
            $elem->save();
            return back()->with('message', 'Fridge is close');}}

}
