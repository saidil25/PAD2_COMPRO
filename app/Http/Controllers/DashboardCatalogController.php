<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\CatalogResource;
use App\Http\Resources\CatalogDetailResource;
use Illuminate\Support\Facades\Storage;

class DashboardCatalogController extends Controller
{
    public function index() {
        $catalogs = Catalog::all();
        return CatalogResource::collection($catalogs);
    }

    public function show($id) {
        $catalog = Catalog::with(['author:id,email,username', 'category:id,name'])->findOrFail($id);
        return new CatalogDetailResource($catalog);
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'category' => 'required|exists:categories,name',
            'file' => 'image|mimes:jpeg,png,jpg|max:10000'
        ], [
            'file.mimes' => 'The file must be a valid image file (jpeg, png, jpg)',
            'file.max' => 'The file size must not exceed 10MB'
        ]);

        $result = null;

        if ($request->hasFile('file')) {
            $fileName = $this->generateRandomString();
            $extension = $request->file('file')->extension();
            $result = $fileName.'.'.$extension;

            $request->file('file')->storeAs('public/image', $result);
        }

        $request['image'] = $result;

        $request['author_id'] = Auth::user()->id;

        $category = Category::where('name', $request->category)->first();
        $request['category_id'] = $category->id;

        $catalog = Catalog::create($request->all());

        return response()->json([
            'message' => 'Catalog created successfully',
            'catalog' => new CatalogDetailResource($catalog->loadMissing(['author:id,email,username', 'category:id,name']))
        ], 201);
    }

    public function update(Request $request, $id) {
        $validated = $request->validate([
            'title' => 'max:255',
            'category' => 'exists:categories,name',
            'file' => 'image|mimes:jpeg,png,jpg|max:10000'
        ], [
            'file.mimes' => 'The file must be a valid image file (jpeg, png, jpg)',
            'file.max' => 'The file size must not exceed 10MB'
        ]);

        $category = Category::where('name', $request->category)->first();
        $request['category_id'] = $category->id;

        $catalog = Catalog::findOrFail($id);

        if ($request->hasFile('file')) {
            if ($catalog->image) {
                Storage::delete('image/' . $catalog->image);
            }

            $fileName = $this->generateRandomString();
            $extension = $request->file('file')->extension();
            $result = $fileName.'.'.$extension;

            $request->file('file')->storeAs('image', $result);
            $request['image'] = $result;
        }

        $catalog->update($request->only('title', 'description', 'category_id', 'image'));

        return response()->json([
            'message' => 'Catalog updated successfully',
            'catalog' => new CatalogDetailResource($catalog->loadMissing(['author:id,email,username', 'category:id,name']))
        ]);
    }

    public function destroy($id) {
        $catalog = Catalog::findOrFail($id);

        if ($catalog->image) {
            Storage::delete('image/' . $catalog->image);
        }

        $catalog->delete();

        return response()->json([
            'message' => 'Catalog deleted successfully'
        ]);
    }

    function generateRandomString($length = 30) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
