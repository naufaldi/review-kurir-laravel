<?php

namespace App\Http\Controllers;

use App\Review;
use Validator;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        Validator::make($request->all(), [
            'content' => 'required|string',
            'nama_kurir_id' => 'required|integer',
            'rate' => 'required|integer',
            'user_id' => 'required|integer'
        ])->validate();

        $title = substr($request->content, 20);
        $slug = str_slug($title)."-".substr(md5($title.Date('Y-m-d H:s:i')), 1, 6);

        $review = new Review();
        $review->content = $request->content;
        $review->nama_kurir_id = $request->nama_kurir_id;
        $review->rate = $request->rate;
        $review->user_id = $request->user_id;
        $review->slug = $slug;
        $review->save();

        return redirect()->back()->with('report', 'Your Review was successfuly sent!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        //
        $review = Review::where('slug', $slug)->first();
        return view('form-feed.show', compact('review'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        //
    }
}
