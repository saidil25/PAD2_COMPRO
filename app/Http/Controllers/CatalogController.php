<?php

namespace App\Http\Controllers;

use App\Http\Resources\CatalogDetailResource;
use App\Http\Resources\CatalogResource;
use App\Models\Catalog;
use App\Models\Category;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index() {
        $catalogs = Catalog::with('category:id,name')->get();
        return CatalogResource::collection($catalogs);
    }

    public function show($id) {
        $catalog = Catalog::with(['author:id,email,username', 'category:id,name'])->findOrFail($id);
        return new CatalogDetailResource($catalog);
    }

    public function filter(Request $request) {
        $request->validate([
            'category' => 'required|string'
        ]);

        $category = Category::where('name', $request->category)->first();

        if (!$category) {
            return response()->json(['error' => 'Category not found'], 404);
        }

        $catalogs = Catalog::with('category:id,name')
            ->where('category_id', $category->id)
            ->get();

        return CatalogResource::collection($catalogs);
    }
}
