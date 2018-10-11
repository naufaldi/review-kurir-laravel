<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    //
    protected $fillable = ['content', 'rate', 'nama_kurir_id', 'user_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
