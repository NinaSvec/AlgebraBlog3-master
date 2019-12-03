<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = ['id'];

    // $comment->post
    // dohvati post kojem pripada komentar
    public function post(){

        return $this->belongsTo(Post::class);
    }

    // $comment->user
    // dohvati usera koji je napisao komentar
    public function user(){

        return $this->belongsTo(User::class);
    }
}
