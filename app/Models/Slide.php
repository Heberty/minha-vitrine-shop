<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function image()
    {
        return asset('storage/slides/' . $this->image);
    }
}
