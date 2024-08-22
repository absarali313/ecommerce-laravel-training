<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;

class ArchiveCategoryController extends Controller
{
    public function index()
    {
        Category::onlyTrashed()->simplePaginate(8);

        return view('admin.category.archive.index');
    }
}
