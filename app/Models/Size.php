<?php

namespace App\Models;

use App\Http\Requests\Admin\Size\SizeRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\Request;

class Size extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'price',
        'stock',
        'product_id',
    ];

    public function product() : BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function prices() : HasMany
    {
        return $this->hasMany(Price::class,'product_size_id');
    }

    /**
     * Returns the current price of a product size
     * @return Price|null
     */
    public function getCurrentPrice() : Price|null
    {
        return $this->prices()->orderByDesc('started_at')->first();
    }

    /**
     * Creates or updates a size along its price
     * @param Request $request
     * @param Product|null $product
     * @param Size|null $size
     * @return Size
     */
    public function setSize(Request $request ,?Product $product = null, ?Size $size = null) : Size
    {

        if($product){
            $this->product_id=$product->id;
            $this->title=$request['title'];
            $this->stock=$request['stock'];
            $this->save();

            $price=(new Price())->setPrice($request,$this);


        }else{
            $this->title=$request['title'];
            $this->stock=$request['stock'];
            $this->save();

            if($size){
                if ($this->getCurrentPrice() != $request['price']) {
                    $price=(new Price())->setPrice($request,$this);
                }
            }
        }



        return $this;
    }

    public function destroySize()
    {
        $this->delete();
    }
}

