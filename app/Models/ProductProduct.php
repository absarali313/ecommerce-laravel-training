<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Http\Request;

class ProductProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'related_product_id',
    ];

    public function product() : BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function scopeRelatedProduct($query, $product,$relatedProduct) : ProductProduct
    {
        return $query->where('product_id', $product)
            ->where('related_product_id', $relatedProduct);
    }

    /**
     * Update or delete the product
     * @param Request $relatedProductData
     * @param Product $product
     * @return void
     */
    public static function updateOrDelete(Request $relatedProductData, Product $product)
    {
        $action = $relatedProductData->input('action');
        if ($action == 'update')
        {
            ProductProduct::where('product_id',$relatedProductData->product_id)->where( 'related_product_id',$product->id)->update([
                'product_id' => $relatedProductData->product_id,
                'related_product_id' => $relatedProductData->related_id,
            ]);
        }
        elseif ($action == 'delete')
        {
            ProductProduct::where('product_id',$relatedProductData->product_id)->where( 'related_product_id',$product->id)->delete();
        }
    }

    public static function setRelatedProduct(Request $relatedProductData)
    {
        ProductProduct::create([
            'product_id' => $relatedProductData->product_id,
            'related_product_id' => $relatedProductData->Related_id,
        ]);
    }
}
