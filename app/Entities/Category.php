<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected  $table = 'categories';
    protected  $primaryKey = 'id';


    protected $fillable = [
      'title', 'description', 'parent_id'
    ];

    protected  $dates = [
        'created_at', 'updated_at'
    ];
}
