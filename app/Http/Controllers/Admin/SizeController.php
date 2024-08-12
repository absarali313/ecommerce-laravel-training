<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Size\SizeRequest;
use App\Models\Product;
use App\Models\Size;

class SizeController extends Controller
{
    public function store(SizeRequest $request, Product $product)
    {
        (new Size())->setSize($request,product: $product);

        return redirect()->back();
    }

    public function update(SizeRequest $request, Size $size)
    {
//        dd($size,$request);
        (Size::findOrFail($size->id))->setSize($request,size: $size);

        return redirect()->back();
    }

    public function destroy(SizeRequest $request, Size $size)
    {
        (Size::findOrFail($size->id))->destroySize();

        return redirect()->back();
    }
}
