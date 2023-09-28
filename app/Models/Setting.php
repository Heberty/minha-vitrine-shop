<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function type()
    {
        return $this->belongsTo('App\Models\Type');
    }

    public function logo()
    {
        return asset('storage/settings/' . $this->image);
    }
}
