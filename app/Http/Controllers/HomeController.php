<?php

namespace App\Http\Controllers;

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
        return view('index');
    }

    public function about()
    {
        $cadena = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et molestias minus nulla nihil rerum, officia suscipit vitae provident quae eos? Ipsum dolore voluptatum dolorum ipsa soluta ab similique magni nam.';
        return response()->json(array('html' => $cadena));
    }
}
