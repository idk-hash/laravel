<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;

class ProductController extends Controller
{
    public function add(Request $request)
        {$formFields = $request->validate([
            'name' => 'required',
            'category' => 'required',
            'quantity' => 'required',
            'unit' => 'required',
            'date_delivered' => 'required',
            'due_date' => 'required']);
        $product = Products::create($formFields);
        if ($product) return redirect('/content')->with('message', 'Product added');
        return redirect('/content')->with('message', 'Error while adding product');}

    public function retrieve(Request $request)
        {$toRetrieve = explode(",", $request->input('basket'));
        foreach ($toRetrieve as $elem)
            Products::where('id', $elem)->delete();
            return redirect('/content')->with('message', 'Basket retrieved');}
}

// Name VARCHAR(255), Quantity INT, Unit VARCHAR(255), Date_delivered DATE, Due_date DATE, Category
