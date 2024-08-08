<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product\UpdateProductRequest;
use App\Http\Requests\Admin\Size\SizeRequest;
use App\Http\Requests\Admin\Size\UpdateSizeRequest;
use App\Models\Price;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class SizeController extends Controller
{
    public function store(SizeRequest $request, Product $product)
    {
        Size::setSize($request->validated(), $product);

        return redirect()->back();
    }

    public function update(SizeRequest $request, Size $size)
    {
        $action = $request->input('action');

        if ($action == 'update') {
            Size::setSize($request->validated(), size:  $size);
        } elseif ($action == 'delete') {
            $size->delete();
        }

        return redirect()->back();

    }
}
