<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CatalogCrudController extends Controller
{
    public function index (){
        return view('admin.catalogs_table');
    }
}
