<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use Sluggable;

    protected $fillable = ['title', 'body',	'slug',	'views', 'user_id'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    // $post->user
    // dohvati usera koji je kreirao post
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    // $post->comments
    // dohvati sve komentare za post
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // $post->tags
    // dohvati sve tagove koje ima post
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public static function popular()
    {
        return self::orderBy('views', 'desc')->limit(5)->get();
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
