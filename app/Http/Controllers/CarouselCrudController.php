<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use Illuminate\Http\Request;

class CarouselCrudController extends Controller
{
    public function index (){
        return view('admin.carousel_form');
    }
    public function edit($id)
    {
        $carousel = Carousel::findOrFail($id);

        return view('admin.carousel_form', compact('carousel'));
    }
}
