<?php

namespace App\Actions\Admin\Size;

use App\Actions\Admin\Category\SaveCategory;
use App\Actions\Admin\Price\CreatePrice;
use App\Models\Category;
use App\Models\Price;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;

class SaveSize
{
    /**
     * Creates of updates size
     * @param array $request the data for size including title, stock, and price
     * @param Product|null $product the product against which a size variant is being added
     * @param Size|null $size the size variant of the product
     * @return Size
     */
   public function handle(array $request, CreatePrice $createPriceAction, ?Product $product = null, ?Size $size = null): Size
   {
       if($product) {
           $size->product_id = $product->id;
           $size->title = $request['size_title'];
           $size->stock = $request['stock'];
           $size->save();

           $price = new Price;
           $createPriceAction->handle($request, $size, $price);
       } else {
           $size->title = $request['title'];
           $size->stock = $request['stock'];
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
