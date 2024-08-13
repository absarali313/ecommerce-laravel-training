<?php

namespace App\Actions\Admin\Size;

use App\Actions\Admin\Price\CreatePriceAction;
use App\Models\Category;
use App\Models\Price;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;

class CreateSizeAction
{
    public function __construct(CreatePriceAction $createPriceAction)
    {
        $this->createPriceAction = $createPriceAction;
    }

   public function handle(array $request, ?Product $product = null, ?Size $size = null): Size
   {
       if($product) {
           $size->product_id=$product->id;
           $size->title=$request['title'];
           $size->stock=$request['stock'];
           $size->save();

           $price = new Price;
           $this->createPriceAction->handle($request, $size, $price);
       } else {
           $size->title=$request['title'];
           $size->stock=$request['stock'];
           $size->save();

           if($size) {
               if ($size->getCurrentPrice() != $request['price']) {
                   $price = new Price;
                   $this->createPriceAction->handle($request, $size, $price);
               }
           }
       }

       return $size;
   }

   protected $createPriceAction;
}
