<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Type;
use App\Http\Requests\TypeRequest;


class TypesController extends Controller
{
    public function index()
    {
    	$types = Type::paginate(10);
    	return view('admin.types.index', compact('types'));
    }

    public function create()
    {
    	return view('admin.types.create');
    }

    public function store(TypeRequest $request)
    {
    	try {
    		$type = new Type($request->all());

			$type->save();

    		return redirect()->route('admin.types.index')->with('success', 'Categoria cadastrada');

    	} catch(\Exception $e) {
    		return redirect()->back()->with('error', 'Ocorreu um erro ao salvar a categoria');
    	}
    }

    public function edit(Type $type)
    {
    	return view('admin.types.edit', compact('type'));
    }

    public function update(TypeRequest $request, Type $type)
    {
    	try {
    		$type->update($request->all());

    		$type->save();

    		return redirect()->route('admin.types.index')->with('success', 'Categoria atualizada com sucesso.');
    	} catch (\Exception $e) {
    		return redirect()->back()->with('error', 'Ocorreu um erro ao atualizar a categoria');
    	}
    }

    public function destroy(Type $type)
    {
    	try {
    		$type->delete();
    		
			return redirect()->route('admin.types.index')->with('success', 'Categoria removida com sucesso.');
    	} catch(\Exception $e) {
    		return redirect()->back()->with('error', 'Ocorreu um erro ao remover a categoria');
    	}
    }
}
