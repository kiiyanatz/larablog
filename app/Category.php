<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // Expricit definition of the table to use
    protected $table = 'categories';

    // Create has many relationship
    public function posts()
    {
    	return $this->hasMany('App\Post');
    }
}
