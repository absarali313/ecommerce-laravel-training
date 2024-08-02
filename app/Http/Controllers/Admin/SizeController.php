<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Price;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class SizeController extends Controller
{
    public function store(Request $request, Product $product){
       $request->validate([
            'size_title' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ]);

        $size =  Size::create([
            'title' => $request->size_title,
            'product_id' => $product->id,
            'stock' => $request->stock,
            ]);

        $price = Price::create([
            'product_size_id' => $size->id,
            'price' => $request->price,
            'started_at'=> Date::now(),
        ]);
        return redirect()->back();
    }

    public function update(Request $request, Size $size){
        $action = $request->input('action');

        if ($action == 'update') {
           $request->validate([
               'size_title' => 'required|string',
               'stock' => 'required|integer',
               'price' => 'required|numeric',
           ]);

           $size->update([
               'title' => $request->size_title,
               'stock' => $request->stock,
           ]);


           if($request->price != $size->getCurrentPrice()->price){
               $price = Price::create([
                   'product_size_id' => $size->id,
                   'price' => $request->price,
                   'started_at'=> Date::now(),
               ]);
           }

        } elseif ($action == 'delete') {
           $size->delete();
        }
        return redirect()->back();
    }
}
