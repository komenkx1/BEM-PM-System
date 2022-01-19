<?php

namespace App\Http\Controllers\Admin;

use App\Models\Hotline;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HotlineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hotlines = Hotline::orderBy('id','DESC')->get();
        return view('admin/hotlines/index',compact('hotlines'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hotline  $hotline
     * @return \Illuminate\Http\Response
     */
    public function show(Hotline $hotline)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hotline  $hotline
     * @return \Illuminate\Http\Response
     */
    public function edit(Hotline $hotline)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hotline  $hotline
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hotline $hotline)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hotline  $hotline
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hotline $hotline)
    {
        $hotline->delete();
        return redirect()->back()->with('danger','Data Telah Dihapus');
    }
}
