<?php 
	use App\Models\Type;

	function formatPrice($price)
	{
	    return number_format($price, 2, ',', '.');
	}

	function storageImage($path, $image)
	{
		return asset('storage/' . $path . '/' . $image);
	}

	function formatNumber($number)
	{
		return preg_replace('/\D/', '' ,$number);
	}

	function typesList()
	{
		$types = Type::get();

		echo $result_types = '<ul class="category-menu-list">';

		foreach($types as $key => $type) {
			if($key < 4) {
			    echo $result_types = '<li class="category-menu-list-item">';
				echo $result_types = '<a href="' . route('offers', $type->slug) . '" class="category-menu-list-item-link">' . $type->title . '</a>';
				echo $result_types = '</li>';
			}
		}

	    echo $result_types = '<li class="category-menu-list-item dropdown">';
		echo $result_types = '<a class="category-menu-list-item-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">+Mais categorias</a>';
		echo $result_types = '<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">';

		foreach($types as $key => $type) {
			if($key > 3) {
	    		echo $result_types = '<a class="dropdown-item" href="' . route('offers', $type->slug) . '">' . $type->title . '</a>';
			}
		}
		
	  	echo $result_types = '</div>';	
	  	echo $result_types = '</li>';	
		$result_types = '</ul>';

        return  $result_types;
	}
?>