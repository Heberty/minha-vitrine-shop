<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slide;
use App\Http\Requests\SlideRequest;
use App\Http\Requests\SlideUpdateRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SlidesController extends Controller
{
    public function index()
    {
        $slides = Slide::paginate(10);

        return view('admin.slides.index', compact('slides'));
    }

    public function create()
    {
        return view('admin.slides.create');
    }

    public function store(SlideRequest $request)
    {
        try {
            $slide = new Slide($request->all());

            if($request->hasFile('image')) {
                $slide->image = Str::random(24) . '.' . $request->file('image')->getClientOriginalExtension();
            }

            $slide->save();

            if($request->hasFile('image')) {
                Storage::putFileAs('slides', $request->file('image'), $slide->image);
            }

            return redirect()->route('admin.slides.index')->with('success', 'Slide cadastrado');

        } catch(\Exception $e) {
            logger()->error($e->getMessage());

            return redirect()->back()->with('error', 'Erro ao cadastrar o slide');
        }
    }

    public function edit(Slide $slide)
    {
        return view('admin.slides.edit', compact('slide'));
    }

    public function update(SlideUpdateRequest $request, Slide $slide)
    {
        try {
            $slide->update($request->all());

            if($request->hasFile('image')) {
                $slide->image = Str::random(24) . '.' . $request->file('image')->getClientOriginalExtension();
            }

            $slide->save();

            if($request->hasFile('image')) {
                Storage::putFileAs('slides', $request->file('image'), $slide->image);
            }

            return redirect()->route('admin.slides.index')->with('success', 'Slide atualizado');

        } catch (\Exception $e) {

            return redirect()->back()->with('admin.slides.index')->with('error', 'Erro ao atualizar slide');

        }
    }

    public function destroy(Slide $slide)
    {
        try {
            $slide->delete();

            return redirect()->route('admin.slides.index')->with('sucesso', 'Slide deletado');

        } catch (\Exception $e) {

            return redirect()->back()->with('error', 'Erro ao deletar o slide');
        }
    }
}
