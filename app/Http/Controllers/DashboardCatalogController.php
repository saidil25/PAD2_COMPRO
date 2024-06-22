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
        $catalogs = Catalog::with('category:id,name')->get();
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
            'file.mimes' => 'File harus berupa file gambar yang valid (jpeg, png, jpg)',
            'file.max' => 'Ukuran file tidak boleh lebih dari 10MB'
        ]);

        $result = null;

        if ($request->hasFile('file')) {
            $fileName = $this->generateRandomString();
            $extension = $request->file('file')->extension();
            $result = $fileName.'.'.$extension;

            // Simpan file ke direktori public/image
            $request->file('file')->storeAs('public/image', $result);
        }

        $request['image'] = $result;
        $request['author_id'] = Auth::user()->id;

        $category = Category::where('name', $request->category)->first();
        $request['category_id'] = $category->id;

        $catalog = Catalog::create($request->all());

        return response()->json([
            'message' => 'Catalog berhasil dibuat',
            'catalog' => new CatalogDetailResource($catalog->loadMissing(['author:id,email,username', 'category:id,name']))
        ], 201);
    }

    public function update(Request $request, $id) {
        $validated = $request->validate([
            'title' => 'nullable|max:255',
            'description' => 'nullable',
            'category' => 'nullable|exists:categories,name',
            'file' => 'nullable|image|mimes:jpeg,png,jpg|max:10000'
        ], [
            'file.mimes' => 'File harus berupa file gambar yang valid (jpeg, png, jpg)',
            'file.max' => 'Ukuran file tidak boleh lebih dari 10MB'
        ]);

        try {
            $catalog = Catalog::findOrFail($id);

            if ($request->has('category')) {
                $category = Category::where('name', $request->category)->first();
                if (!$category) {
                    return response()->json(['error' => 'Kategori tidak ditemukan'], 404);
                }
                $catalog->category_id = $category->id;
            }

            if ($request->hasFile('file')) {
                // Delete old image if exists
                if ($catalog->image) {
                    Storage::delete('public/image/' . $catalog->image);
                }

                // Store new image
                $fileName = $this->generateRandomString();
                $extension = $request->file('file')->extension();
                $result = $fileName . '.' . $extension;
                $request->file('file')->storeAs('public/image', $result);
                $catalog->image = $result;
            }

            // Update title if provided
            if ($request->filled('title')) {
                $catalog->title = $request->input('title');
            }

            // Update description if provided
            if ($request->filled('description')) {
                $catalog->description = $request->input('description');
            }

            $catalog->save();

            return response()->json([
                'message' => 'Catalog berhasil diperbarui',
                'catalog' => new CatalogDetailResource($catalog->loadMissing(['author:id,email,username', 'category:id,name']))
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function destroy($id) {
        $catalog = Catalog::findOrFail($id);

        if ($catalog->image) {
            Storage::delete('public/image/' . $catalog->image);
        }

        $catalog->delete();

        return response()->json([
            'message' => 'Catalog deleted successfully'
        ]);
    }

    public function generateRandomString($length = 30) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
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
