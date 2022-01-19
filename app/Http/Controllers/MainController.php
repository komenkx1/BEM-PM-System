<?php

namespace App\Http\Controllers;

use App\Models\Events;
use App\Models\Hotline;
use App\Models\Jurnal;
use App\Models\Post;
use App\Models\LembagaMahasiswa;
use App\Models\Proker;
use App\Models\Ukm;
use App\Models\Paguyuban;
use App\Models\Poadcast;
use Illuminate\Http\Request;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jurnal = Jurnal::where('status','active')->get()->first();
        $poadcast = Poadcast::where('status','active')->get()->first();
        // dd($jurnal);
        $posts = Post::orderBy('pid', 'DESC')->paginate('3');
        $events = Events::get();
        return view('index', compact('posts','events','jurnal','poadcast'));
    }

    public function blog()
    {
        $posts = Post::orderBy('pid', 'DESC')->paginate('3');
        $postsRecent = Post::orderBy('pid', 'DESC')->paginate('4');
        return view('blog', compact('posts','postsRecent'));
    }
    public function blogSearch(Request $request)
    {
        $cari = $request->cari;
        $posts = Post::where('ptitle', 'like', '%'.$cari.'%')->paginate();
        $postsRecent = Post::orderBy('pid', 'DESC')->paginate('4');
        $count = count($posts);

        return view('blog', compact('posts','postsRecent'));

    }

    public function BlogDetail(Post $blog)
    {
        $postsRecent = Post::orderBy('pid', 'DESC')->paginate('4');
        return view('detail-blog', compact('blog','postsRecent'));
    }

    public function lembaga()
    {
        $lembagas = LembagaMahasiswa::all();
        // dd($lembagas);
        return view('lembaga-mahasiswa', compact('lembagas'));
    }

    public function proker()
    {
        $prokers = Proker::all();
        return view('program-kerja', compact('prokers'));
    }

    public function ukm()
    {
        $ukms = Ukm::all();
        return view('ukm', compact('ukms'));
    }

    public function UkmDetail(Ukm $ukm)
    {
        return view('detail-ukm', compact('ukm'));
    }


    public function paguyuban()
    {
        $paguyubans = Paguyuban::all();
        return view('paguyuban', compact('paguyubans'));
    }

    public function PaguyubanDetail(Paguyuban $paguyuban)
    {
        return view('detail-paguyuban', compact('paguyuban'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $hotline = $request->all();
        Hotline::create($hotline);
        return redirect()->back()->with('success','data berhasil disimpan');
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
