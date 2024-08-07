<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image_path',
        'parent_id'
    ];

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Category::class,'parent_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(Category::class,'parent_id');
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class,'category_product');
    }

    /**
     * Stores the category image
     * @param \Illuminate\Http\UploadedFile $images
     */
    public function storeImage(UploadedFile $images)
    {
        if ($images)
        {
            foreach ($images as $image)
            {
                $path = $image->store('category_images');
                $this->image_path = $path;
            }
        }
    }

    /**
     * Stores or updates the category
     * return instance of resultant category
     * @param String $name
     * @param String $parentName
     * @param File nullable $image
     * @return Category
     */
    public static function setCategory(String $name, String $parentName, File $image = null ) : Category
    {
        $parentCategoryId = Category::where('name', $parentName)->value('id');

        $category = Category::create([
            'name' => $name,
            'parent_id' => $parentCategoryId,
        ]);

        return $category;
    }
}
