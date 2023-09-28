<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
	protected $table = 'galleries';

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function product()
    {
    	return $this->belongsTo('App\Models\Product');
    }
}
