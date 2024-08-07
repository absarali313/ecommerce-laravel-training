<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product\UpdateProductRequest;
use App\Http\Requests\Admin\Size\StoreSizeRequest;
use App\Http\Requests\Admin\Size\UpdateSizeRequest;
use App\Models\Price;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class SizeController extends Controller
{
    public function store(StoreSizeRequest $request, Product $product)
    {
        $request->validated();

        Size::setSize($request, $product);

        return redirect()->back();
    }

    public function update(StoreSizeRequest $request, Size $size)
    {
        $action = $request->input('action');

        if ($action == 'update')
        {
           $request->validated();
            Size::setSize($request, size:  $size);
        }
        elseif ($action == 'delete')
        {
            $size->delete();
        }

        return redirect()->back();

    }
}
