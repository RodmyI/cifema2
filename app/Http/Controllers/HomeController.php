<?php

namespace App\Http\Controllers;

use App\Product;
use App\Typept;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        session(['page' => 'home', 'page_item' => 'home_index']);

        return view('dashboard');
    }

    /**
     * Display a listing of the resource and categories.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $products = Product::get();

        return view('home', compact('products'));
    }
}
