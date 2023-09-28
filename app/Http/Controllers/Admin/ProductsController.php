<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Type;
use App\Models\Gallery;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\ProductUpdateRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductsController extends Controller
{
    public function uploadGallery($request) {
        $photos = [];
        foreach($request as $key => $photo) {
            $name = date('YmdHis').Str::random(8) . '.' . $photo->getClientOriginalExtension();
            Storage::putFileAs('galleries', $photo, $name);

            $photos[$key] = ['name' => $name];
        }

        return $photos;
    }

    public function index()
    {
        $products = Product::orderBy('position')->paginate(10);

        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $types = Type::get();
        return view('admin.products.create', compact('types'));
    }

    public function store(ProductRequest $request)
    {
        try {
            $product = new Product($request->all());

            if($request->hasFile('image')) {
                $product->image = Str::random(24) . '.' . $request->file('image')->getClientOriginalExtension();
            }

            if($product->save()) {
                if($request->hasFile('gallery')) {
                    $photos = $this->uploadGallery($request->gallery);
                    $product->gallery()->createMany($photos);
                }
            }

            Storage::putFileAs('products', $request->file('image'), $product->image);

            return redirect()->route('admin.products.index')->with('success', 'Produto cadastrado');

        } catch(\Exception $e) {
            logger()->error($e->getMessage());

            return redirect()->back()->with('error', 'Erro ao cadastrar o produto');
        }
    }

    public function edit(Product $product)
    {
        $types = Type::get();
        return view('admin.products.edit', compact('product', 'types'));
    }

    public function update(ProductUpdateRequest $request, Product $product)
    {
        try {
            $product->update($request->all());

            if($request->hasFile('image')) {
                $product->image = Str::random(24) . '.' . $request->file('image')->getClientOriginalExtension();
            }

            if($product->save()) {
                if($request->hasFile('gallery')) {
                    $photos = $this->uploadGallery($request->gallery);
                    $product->gallery()->createMany($photos);
                }
            }

            if($request->hasFile('image')) {
                Storage::putFileAs('products', $request->file('image'), $product->image);
            }


            return redirect()->route('admin.products.index')->with('success', 'Produto atualizado');

        } catch (\Exception $e) {
            logger()->error($e->getMessage());
            return redirect()->back()->with('admin.products.index')->with('error', 'Erro ao atualizar o produto');

        }
    }

    public function destroy(Product $product)
    {
        try {
            $product->delete();

            return redirect()->route('admin.products.index')->with('success', 'Produto deletado');

        } catch (\Exception $e) {

            return redirect()->back()->with('error', 'Erro ao deletar o produto');
        }
    }

    public function destroyImage(Gallery $image) {
        try {
            $image->delete();

            return redirect()->back()->with('success', 'Imagem removida com sucesso');
        } catch(\Exception $e) {
            return redirect()->back()->with('error', 'Ocorreu um erro ao excluir a imagem');
        }
    }
}
