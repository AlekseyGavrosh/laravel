<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected  $table = 'comments';
    protected  $primaryKey = 'id';

    protected  $fillable = [
        'article_id',
        'user_id',
        'status',
        'comment',
    ];

    protected $dates = [
        'created_at', 'updated_at'
    ];

//    public function articles()
//    {
//        return $this->belongsToMany(Category::class, 'category_articles', 'article_id', 'category_id');
//    }
}
