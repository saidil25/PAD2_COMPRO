<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catalog;
use App\Models\Category;

class CatalogCrudController extends Controller
{
    public function index (){
        return view('admin.catalog_form');
    }

    public function edit($id)
    {
        $catalog = Catalog::findOrFail($id);
        $categories = Category::all();

        return view('admin.catalog_form', compact('catalog', 'categories'));
    }
}
