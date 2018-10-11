<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;
use App\Kurir;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kurirs = Kurir::get();
        $reviews = Review::orderBy('created_at', 'desc')->paginate(12);
        return view('home', compact('kurirs', 'reviews'));
    }
}
