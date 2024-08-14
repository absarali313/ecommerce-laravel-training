<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Admin\Price\CreatePrice;
use App\Actions\Admin\Size\CreateSize;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Size\SizeRequest;
use App\Models\Product;
use App\Models\Size;

class SizeController extends Controller
{
    public function store(SizeRequest $request, Product $product, CreateSize $createSizeAction)
    {
        $size = new Size;
        $createSizeAction->handle($request->validated(), new CreatePrice(), $product, $size);

        return redirect()->back();
    }

    public function update(SizeRequest $request, Size $size, CreateSize $createSizeAction)
    {
        $createSizeAction->handle($request->validated(), new CreatePrice(), size: $size);

        return redirect()->back();
    }

    public function destroy(Size $size)
    {
        $size->delete();

        return redirect()->back();
    }
}
