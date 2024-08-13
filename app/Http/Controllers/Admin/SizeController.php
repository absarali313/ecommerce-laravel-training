<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Admin\Size\CreateSizeAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Size\SizeRequest;
use App\Models\Product;
use App\Models\Size;

class SizeController extends Controller
{
    public function store(SizeRequest $request, Product $product, CreateSizeAction $createSizeAction)
    {
        $size = new Size;
        $createSizeAction->handle($request->validated(), $product, $size);

        return redirect()->back();
    }

    public function update(SizeRequest $request, Size $size, CreateSizeAction $createSizeAction)
    {
        $createSizeAction->handle($request->validated(),size: $size);

        return redirect()->back();
    }

    public function destroy(Size $size)
    {
        $size->destroySize();

        return redirect()->back();
    }
}
