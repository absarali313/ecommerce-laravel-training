<?php

namespace App\Actions\Admin\Size;

use App\Actions\Admin\Category\CreateCategory;
use App\Actions\Admin\Price\CreatePrice;
use App\Models\Category;
use App\Models\Price;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;

class CreateSize
{
    /**
     * Creates of updates size
     * @param array $request
     * @param Product|null $product
     * @param Size|null $size
     * @return Size
     */
   public function handle(array $request, CreatePrice $createPriceAction, ?Product $product = null, ?Size $size = null): Size
   {
       if($product) {
           $size->product_id=$product->id;
           $size->title=$request['title'];
           $size->stock=$request['stock'];
           $size->save();

           $price = new Price;
           $createPriceAction->handle($request, $size, $price);
       } else {
           $size->title=$request['title'];
           $size->stock=$request['stock'];
           $size->save();

           if($size) {
               if ($size->getCurrentPrice() != $request['price']) {
                   $price = new Price;
                   $createPriceAction->handle($request, $size, $price);
               }
           }
       }

       return $size;
   }
}
