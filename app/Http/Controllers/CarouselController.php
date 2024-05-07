<?php

namespace App\Http\Controllers;

use App\Http\Resources\CarouselResource;
use App\Models\Carousel;
use Illuminate\Http\Request;

class CarouselController extends Controller
{
    public function index() {
        $carousels = Carousel::with('author:id,email,username')->get();
        return CarouselResource::collection($carousels);
    }
}
