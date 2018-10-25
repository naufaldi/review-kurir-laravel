<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    //
    protected $fillable = ['content', 'rate', 'nama_kurir_id', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comment()
    {
        return $this->hasMany(CommentReview::class);
    }

    public function kurir()
    {
        return $this->belongsTo(Kurir::class, 'nama_kurir_id');
    }
}
