<?php

namespace App\Http\Controllers;

use App\CommentReview;
use Illuminate\Http\Request;

use Validator;

class CommentReviewController extends Controller
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
            'user_id' => 'required|integer',
            'review_id' => 'required|integer'
        ])->validate();
        
        CommentReview::create($request->all());

        return redirect()->back()->with('report_comment', 'Success Comment');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CommentReview  $commentReview
     * @return \Illuminate\Http\Response
     */
    public function show(CommentReview $commentReview)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CommentReview  $commentReview
     * @return \Illuminate\Http\Response
     */
    public function edit(CommentReview $commentReview)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CommentReview  $commentReview
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CommentReview $commentReview)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CommentReview  $commentReview
     * @return \Illuminate\Http\Response
     */
    public function destroy(CommentReview $commentReview)
    {
        //
    }
}
