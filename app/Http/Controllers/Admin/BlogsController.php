<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BlogRequest;
use App\Http\Requests\BlogTypeRequest;
use Illuminate\Support\Facades\Storage;
use App\Models\Blog;
use App\Models\Blog_type;
use Str;

class BlogsController extends Controller
{
    public function index()
    {
        $blogs = Blog::paginate(10);

        return view('admin.blogs.index', compact('blogs'));
    }

    public function create()
    {
        $blog_types = Blog_type::get();

        return view('admin.blogs.create', compact('blog_types'));
    }

    public function store(BlogRequest $request)
    {
        try {
            $blogs = new Blog($request->all());
            if($request->hasFile('image_full')){
                $blogs->image_full = Str::random(24) . '.' . $request->file('image_full')->getClientOriginalExtension();
            }

            if($request->hasFile('thumbnail')){
                $blogs->thumbnail = Str::random(24) . '.' . $request->file('thumbnail')->getClientOriginalExtension();
            }

            if($request->hasFile('image_full')){
                Storage::putFileAs('blogs', $request->file('image_full'), $blogs->image_full);
            }

            if($request->hasFile('thumbnail')){
                Storage::putFileAs('blogs', $request->file('thumbnail'), $blogs->thumbnail);
            }

            $blogs->save();

            return redirect()->route('admin.blogs.index')->with('success', 'Postagem cadastrada com sucesso!');
        } catch (\Exception $e) {
            logger()->error($e->getMessage());

            return redirect()->back()->with('error', 'Não foi possível inserir a postagem!') ;
        }
    }
}
