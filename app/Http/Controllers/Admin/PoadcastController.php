<?php

namespace App\Http\Controllers\Admin;


use App\Models\Poadcast;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class PoadcastController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $poadcasts = Poadcast::orderBy('id','DESC')->get();
        return view('admin/poadcast/index', compact('poadcasts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/poadcast/create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $poadcasts = $request->all();
        
            $poadcasts['status'] = 'active';
            Poadcast::where('status','active')->update(['status' => "nonaktif"]);
            Poadcast::create($poadcasts);
        
        return redirect(Route('poadcast'))->with('success', 'Link Poadcast Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Poadcast  $poadcast
     * @return \Illuminate\Http\Response
     */
    public function show(Poadcast $poadcast)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Poadcast  $poadcast
     * @return \Illuminate\Http\Response
     */
    public function edit(Poadcast $poadcast)
    {
        return view('admin/poadcast/edit',compact('poadcast'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Poadcast  $poadcast
     * @return \Illuminate\Http\Response
     */
    public function active(Request $request, Poadcast $poadcast)
    {
        $active = Poadcast::where('status', 'active')->get();
        if ($active) {
            Poadcast::where('status', 'active')
                ->update(['status' => "nonaktif"]);
        }
        $poadcast->status = 'active';
        $poadcast->update();
        return redirect()->back()->with('info', 'Berhasil Mengupdate Status');
    }
    public function nonaktif(Request $request, Poadcast $poadcast)
    {
        $poadcast->status = 'nonaktif';
        $poadcast->update();
        return redirect()->back()->with('info', 'Berhasil Mengupdate Status');
    }



    public function update(Request $request, Poadcast $poadcast)
    {
        $poadcasts = $request->all();

            $poadcast->update($poadcasts);
        
        return redirect(Route('poadcast'))->with('info', ' Poadcast Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Poadcast  $poadcast
     * @return \Illuminate\Http\Response
     */
    public function destroy(Poadcast $poadcast)
    {
        $lastPoadcats =  Poadcast::orderBy('id','DESC')->first();
        $poadcast->delete();
        if ($poadcast->id == $lastPoadcats->id ) {

            Poadcast::orderBy('id','DESC')->first()->update(['status' => "active"]);
        }
        return redirect()->back()->with('danger','Data Telah Dihapus');
    }
}
