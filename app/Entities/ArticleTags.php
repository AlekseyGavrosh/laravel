<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class ArticleTags extends Model
{

    protected  $table = 'article_tags';
    protected  $primaryKey = 'id';


    protected  $fillable = [
        'article_id',
        'tags_id',
    ];


    protected  $dates = [
        'created_at', 'updated_at'
    ];
}
