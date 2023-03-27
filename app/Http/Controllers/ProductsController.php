<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index() {
        $title = 'Laravel from Lan';
        $x = 1;
        $y = 2;
        return view('products.index',compact('title','x','y'));
    }
    public function about() {
        return 'This is About page';
    }
}
