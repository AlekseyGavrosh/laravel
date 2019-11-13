<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    protected  $table = 'tags';
    protected  $primaryKey = 'id';


    protected $fillable = [
        'name'
    ];

    protected  $dates = [
        'created_at', 'updated_at'
    ];


    public function tags()
    {
        return $this->belongsToMany(Tags::class, 'article_tags',  'tags_id', 'article_id');
    }
}
