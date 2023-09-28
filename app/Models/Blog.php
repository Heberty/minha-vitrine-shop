<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function blog_type()
    {
        return $this->belongsTo('App\Models\Blog_type');
    }

    public function image($image)
    {
        return asset('storage/blogs') . '/' . $this->$image;
    }
}
