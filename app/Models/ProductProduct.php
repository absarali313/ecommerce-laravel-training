<?php

namespace App\Models;

use App\Http\Requests\Admin\ProductProduct\ProductProductRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Void_;

class ProductProduct extends Model
{
    protected $fillable = [
        'product_id',
        'related_product_id',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function scopeRelatedProduct($query, $product, $relatedProduct): ProductProduct
    {
        return $query->where('product_id', $product)
            ->where('related_product_id', $relatedProduct);
    }

    /**
     * Add or Update the product
     * @return void
     */
    public function destroyRelatedProduct(): void
    {
        $this->delete();
    }

    /**
     *  delete the product
     * @param Request $relatedProductData
     * @return void
     */
    public function setRelatedProduct(Request $relatedProductData): void
    {
        $this->fill($relatedProductData->all());
        $this->save();
    }
}
