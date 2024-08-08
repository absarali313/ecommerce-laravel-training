<?php

namespace App\Models;

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
        'stock',
        'product_id',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function prices(): HasMany
    {
        return $this->hasMany(Price::class,'product_size_id');
    }

    /**
     * Returns the current price of a product size
     * @return Price|null
     */
    public function getCurrentPrice(): Price|null
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
    public static function setSize(Request $request, ?Product $product = null, ?Size $size = null): Size
    {
        if ($size) {
            // Update existing size
            $size->update([
                'title' => $request['size_title'],
                'stock' => $request['stock'],
            ]);

            if ($size->getCurrentPrice() != $request['price']) {
                Price::createPrice($size->id, $request['price']);
            }
        } elseif ($product) {
            // Create new size
            $size = self::create([
                'title' => $request['size_title'],
                'stock' => $request['stock'],
                'product_id' => $product->id,
            ]);

            Price::createPrice($size->id, $request['price']);
        }

        return $size;
    }
}
