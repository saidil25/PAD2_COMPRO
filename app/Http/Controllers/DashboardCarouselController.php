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

    public function show($id) {
        $carousel = Carousel::findOrFail($id);
        return new CarouselResource($carousel->loadMissing(['author:id,email,username']));
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'file' => 'image|mimes:jpeg,png,jpg|max:5120'
        ], [
            'file.mimes' => 'The file must be a valid image file (jpeg, png, jpg)',
            'file.max' => 'The file size must not exceed 2MB'
        ]);

        $result = null;

        if ($request->hasFile('file')) {
            $fileName = $this->generateRandomString();
            $extension = $request->file('file')->extension();
            $result = $fileName . '.' . $extension;

            $request->file('file')->storeAs('public/image', $result);
        }

        $carousel = new Carousel();
        $carousel->title = $request->title;
        $carousel->image = $result;
        $carousel->author_id = Auth::user()->id;
        $carousel->save();

        return response()->json([
            'message' => 'Carousel created successfully',
            'catalog' => new CarouselResource($carousel->loadMissing(['author:id,email,username']))
        ], 201);
    }

    public function update(Request $request, $id) {

        $validated = $request->validate([
            'title' => 'max:255',
            'file' => 'image|mimes:jpeg,png,jpg|max:5120'
        ], [
            'file.mimes' => 'The file must be a valid image file (jpeg, png, jpg)',
            'file.max' => 'The file size must not exceed 2MB'
        ]);

        $carousel = Carousel::findOrFail($id);

        if ($request->hasFile('file')) {
            if ($carousel->image) {
                Storage::delete('public/image/' . $carousel->image);
            }

            $fileName = $this->generateRandomString();
            $extension = $request->file('file')->extension();
            $result = $fileName . '.' . $extension;

            $request->file('file')->storeAs('public/image', $result);
            $carousel->image = $result;
        }

        if ($request->title) {
            $carousel->title = $request->title;
        }

        $carousel->save();

        return response()->json([
            'message' => 'Carousel updated successfully',
            'catalog' => new CarouselResource($carousel->loadMissing(['author:id,email,username']))
        ]);
    }

    public function destroy($id) {

        // dd($id);
        $carousel = Carousel::findOrFail($id);

        if ($carousel->image) {
            Storage::delete('public/image/' . $carousel->image);
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
