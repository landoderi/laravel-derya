<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    //protected $table = 'post';

    public $fillable = ['title', 'content'];

    public $visible = ['id', 'title', 'content'];

    public $timestamps = true;
}
