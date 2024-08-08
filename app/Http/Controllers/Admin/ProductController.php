<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product\StoreProductRequest;
use App\Http\Requests\Admin\Product\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Session\Store;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(10);

        return view('admin.product.index', [
            'products' => $products,
        ]);
    }

    public function create()
    {
        $categories = Category::all();

        return view('admin.product.create', [
            'categories' => $categories,
        ]);
    }

<<<<<<< HEAD
    public function store(Request $request)
=======
    public function store(StoreProductRequest $request)
>>>>>>> a533a6f (refactor : implement thin controller fat model)
    {
        $validatedData = $request->validated();
        $product = Product::setProduct($validatedData);

        return redirect()->route('products.edit', $product);
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $validatedData = $request->validated();
        Product::setProduct($validatedData, $product);

        return redirect("/admin/products/edit/$product->id");
    }

    public function edit(Request $request, Product $product)
    {
        return view('admin.product.edit', [
            'product' => $product,
            'categories' => Category::all(),
            'selectedCategories' => $product->categories,
            'productSizes' => $product->sizes,
            'relatedProducts' => $product->relatedProducts,
        ]);
    }
<<<<<<< HEAD

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'images' => 'nullable',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'visibility' => Rule::in(['active', 'inactive']),
            'categories' => 'nullable|array',
            'categories.*' => 'exists:categories,id',
        ]);

        $visibility = true;
        if ($validated['visibility'] == ('inactive'))
        {
            $visibility = false;
        }

        try
        {
            $product->update([
                'title' => $validated['title'],
                'description' => $validated['description'],
                'Visibility' => $visibility,
            ]);

            // Store Image
            if ($request->has('images'))
            {
                foreach ($request->images as $image)
                {
                    $path = $image->store('product_images');
                    Log::info('Image stored at: ' . $path);
                    $product->images()->create(['image_path' => $path, 'product_id' => $product->id]);
                }
            }

            // Associate category_product relationship
            if ($request->has('categories'))
            {
                $product->categories()->attach($validated['categories']);
            }

            return redirect()->back();

        }
        catch (Exception $e)
        {
            return redirect()->back()
                ->withInput($request->only('title'))
                ->withErrors([
                    'title' => $e->getMessage(),
                ]);
        }
    }

    public function destroy(Product $product)
    {
        $product->destroyProduct();

        return redirect("/admin/products");
    }

    public function archive_index(Product $product)
    {
        $products=Product::onlyTrashed()->get();

        return view('admin.product.archive-index',['products'=>$products, 'status'=>false]);

    }

    public function restore(Request $request, $id)
    {
        $product=Product::withTrashed()->findOrFail($id);
        $product->restore(); // Restore the soft-deleted product

        return redirect()->route('products.archive')->with('success', 'Product restored successfully!');

    }
=======
>>>>>>> a533a6f (refactor : implement thin controller fat model)
}