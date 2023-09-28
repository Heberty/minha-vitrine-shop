<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Models\Slide;
use App\Models\Product;
use App\Models\Type;
use App\Exports\ProductsExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;


class PagesController extends Controller
{
    protected $request;
    private $repository;

    public function __construct(Request $request, Product $product, Type $type)
    {
        $this->request = $request;
        $this->repository = $product;
    }

    public function index(Request $request)
    {	
        $products = Product::orderBy('position')->paginate(12);
        $types = Type::get();
        $slides = Slide::all()->sortByDesc('created_at');

	    return view('pages.index', compact('products', 'types', 'slides'));
    }

    public function offers($slug = null)
    {
        if(isset($slug) && !empty($slug)) {
            $typeFilter = Type::where('slug', $slug)->firstOrFail();
            $products = Product::where('type_id', $typeFilter->id)->paginate(15);
        } else {
            $products = Product::orderBy('position')->paginate(15);
        }

        $types = Type::get();

        return view('pages.offers', compact('products', 'types'));
    }

    public function offer($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        $products = Product::limit(6)->orderby('position')->get();
        $types = Type::get();

        return view('pages.offer', compact('product', 'types', 'products'));
    }

    public function about()
    {
        $types = Type::paginate(6);

        return view('pages.about', compact('types'));
    }

    public function search(Request $request)
    {
        $products = $this->repository->search($request->filter);
        $types = Type::get();

        return view('pages.offers', compact('products', 'types'));
    }

    public function export() 
    {
        //return (new ProductsExport)->download('invoices.csv', \Maatwebsite\Excel\Excel::CSV);
        return Excel::download(new ProductsExport, 'products.csv');
    }
}
