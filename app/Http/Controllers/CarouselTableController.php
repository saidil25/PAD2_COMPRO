<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarouselTableController extends Controller
{
    public function index (){
        return view('admin.carousel_table');
    }
}
