<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;

use App\EnhancedFeedItem;

class Product extends Model implements Feedable
{
    protected $guarded = ['id', 'gallery', 'created_at', 'updated_at'];

    public function type()
    {
        return $this->belongsTo('App\Models\Type');
    }

    public function gallery()
    {
        return $this->hasMany('App\Models\Gallery');
    }

    public function product()
    {
        return asset('storage/products/' . $this->image);
    }

    public function search($filter = null)
    {
    	$results = $this->where(function($query) use($filter) {
    		if($filter) {
    			$query->where('title', 'LIKE', "%{$filter}%");
    		}
    	})->get();

		return $results;
    }

    public function toFeedItem()
    {
        return EnhancedFeedItem::create()
            ->id($this->id)
            ->title($this->title)
            ->description($this->description)
            ->summary($this->title)
            ->price($this->price)
            ->link(empty($this->link)? '' : $this->link)
            ->image_link(empty($this->image)? '' : $this->image)
            ->brand(empty($this->brand)? '' : $this->brand)
            ->author(empty($this->author) ? '':$this->author)
            ->updated(\Carbon\Carbon::parse($this->update_at)); 
    }

    public static function getAllFeeds()
    {
       return Product::all();
    }
}
