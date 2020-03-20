<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';
    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'author',
        'short_text',
        'full_text'

    ];

    protected $dates = [
        'created_at', 'updated_at'
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_articles', 'article_id', 'category_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tags::class, 'article_tags', 'article_id', 'tags_id');
    }

    public function comments()
    {
//        return $this->belongsToMany(Comments::class, 'comments', 'article_id', 'article_id');
        return $this->hasMany('App\Entities\Comments', 'article_id');
    }

    public function commentsFromWhom($user_id)
    {
//        return $this->belongsToMany(Comments::class, 'comments', 'article_id', 'article_id');
        return $this->hasMany('App\Entities\User', 'id', $user_id);
    }
}
