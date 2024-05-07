<?php

namespace App\Http\Controllers;

use App\Http\Resources\CatalogDetailResource;
use App\Http\Resources\CatalogResource;
use App\Models\Catalog;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index() {
        $catalogs = Catalog::with(['author:id,email,username', 'category:id,name'])->get();
        return CatalogResource::collection($catalogs);
    }

    public function show($id) {
        $catalog =  Catalog::with(['author:id,email,username', 'category:id,name'])->findOrFail($id);
        return new CatalogDetailResource($catalog);
    }
}
