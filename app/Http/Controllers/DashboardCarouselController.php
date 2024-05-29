<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\CarouselResource;

class DashboardCarouselController extends Controller
{
    public function index() {
        $carousels = Carousel::all();
        return CarouselResource::collection($carousels);
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'title' => 'required|max:255',
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

        $carousel = Carousel::create($request->all());

        return response()->json([
            'message' => 'Carousel created successfully',
            'catalog' => new CarouselResource($carousel->loadMissing(['author:id,email,username']))
        ], 201);
    }

    public function update(Request $request, $id) {
        $validated = $request->validate([
            'title' => 'max:255',
        ], [
            'file.mimes' => 'The file must be a valid image file (jpeg, png, jpg)',
            'file.max' => 'The file size must not exceed 10MB'
        ]);

        $carousel = Carousel::findOrFail($id);

        if ($request->hasFile('file')) {
            if ($carousel->image) {
                Storage::delete('image/' . $carousel->image);
            }

            $fileName = $this->generateRandomString();
            $extension = $request->file('file')->extension();
            $result = $fileName.'.'.$extension;

            $request->file('file')->storeAs('image', $result);
            $request['image'] = $result;
        }

        $carousel->update($request->only('title', 'image'));

        return response()->json([
            'message' => 'Carousel updated successfully',
            'catalog' => new CarouselResource($carousel->loadMissing(['author:id,email,username']))
        ]);
    }

    public function destroy($id) {
        $carousel =  Carousel::findOrFail($id);

        if ($carousel->image) {
            Storage::delete('image/' . $carousel->image);
        }

        $carousel->delete();

        return response()->json([
            'message' => 'Carousel deleted successfully'
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
