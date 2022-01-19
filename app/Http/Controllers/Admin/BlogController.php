<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;




use App\Models\Post;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('pid', 'DESC')->get();
        return view('admin/blog/index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/blog/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $posts = $request->all();
        $validator = Validator::make($posts, [
            'pimage'      => 'max:1024|mimes:jpeg,jpg,png',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {
            $posts['pslug'] = Str::slug($request->ptitle, '-');
            $posts['ptime'] = now();

            if ($request->pimage) {
                $file_name = md5($request->ptitle . microtime()) . '.' . $request->pimage->extension();
                $request->pimage->storeAs('img/blog/', $file_name);
                $posts['pimage'] =  $file_name;
            }
            Post::create($posts);
        }
        return redirect(Route('blog-admin'))->with('success', 'Postingan Blog Berhasil Dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin/blog/edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $posts = $request->all();
        $validator = Validator::make($posts, [
            'pimage'      => 'max:1024|mimes:jpeg,jpg,png',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {
            $posts['pslug'] = Str::slug($request->ptitle, '-');
            if ($request->file('pimage')) {
                Storage::delete('img/blog/' . $post->pimage); // menghapus gambar atau file
                $file_name = md5($request->ptitle . microtime()) . '.' . $request->pimage->extension();
                $request->pimage->storeAs('img/blog/', $file_name);
                $posts['pimage'] =  $file_name;
            }

            $post->update($posts);
        }
        return redirect(Route('blog-admin'))->with('info', 'Berhasil Mengupdate Postingan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        Storage::delete('img/blog/' . $post->pimage);
        $post->delete();
        return redirect()->back()->with('danger', 'Data Telah Dihapus');
    }
}
