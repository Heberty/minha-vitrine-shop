<?php

namespace App;

use Spatie\Feed\FeedItem;
use App\Models\Product;

class EnhancedFeedItem extends FeedItem
{
    /** @var string */
    protected $description;
    protected $availability;
    protected $condition;
    protected $image_link;
    protected $brand;
    protected $price;
    
    public function brand(string $brand)
    {
        $this->brand = $brand;

        return $this;
    }
    
    public function image_link(string $image_link)
    {
    	$this->image_link = asset('storage/products') . '/' . $image_link;

        return $this;
    }
    
    public function condition(string $condition)
    {
        $this->condition = 'new';

        return $this;
    }
    
    public function availability(string $availability)
    {
        $this->availability = 'in_stock';

        return $this;
    }
    
    public function description(string $description)
    {
        $this->description = $description;

        return $this;
    }
    
    public function price($price) {
        $this->price = \money_format('%.2n', $price);
        return $this;
    }

}