<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentReview extends Model
{
    //
    protected $fillable = ['user_id', 'review_id', 'content'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
