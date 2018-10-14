<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;

class FrontController extends Controller
{
    //

    public function __construct(){
        $this->middleware('reviews.redirect')->only(['reviews']);
    }

    public function home(){
        return view('welcome');
    }

    public function reviews(){
        $reviews = Review::orderBy('created_at', 'DESC')->paginate(12);
        return view('home', compact('reviews'));
    }
}
