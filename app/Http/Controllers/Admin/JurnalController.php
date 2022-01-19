<?php

namespace App\Http\Controllers\Admin;


use App\Models\Jurnal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class JurnalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jurnals = Jurnal::orderBy('id', 'DESC')->get();
        return view('admin/jurnal/index', compact('jurnals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/jurnal/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $jurnals = $request->all();
        $validator = Validator::make($jurnals, [
            'thumbnail'      => 'max:1024|mimes:jpeg,jpg,png',
            'volume'      => 'numeric',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {
            $jurnals['status'] = 'active';

            if ($request->thumbnail) {
                $file_name = md5($request->title . microtime()) . '.' . $request->thumbnail->extension();
                $request->thumbnail->storeAs('img/jurnal/', $file_name);
                $jurnals['thumbnail'] =  $file_name;
            }
            Jurnal::where('status','active')->update(['status' => "nonaktif"]);
            Jurnal::create($jurnals);
            
        }
        return redirect(Route('jurnal'))->with('success', 'Jurnal Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jurnal  $jurnal
     * @return \Illuminate\Http\Response
     */
    public function show(Jurnal $jurnal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jurnal  $jurnal
     * @return \Illuminate\Http\Response
     */
    public function edit(Jurnal $jurnal)
    {
        return view('admin/jurnal/edit', compact('jurnal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jurnal  $jurnal
     * @return \Illuminate\Http\Response
     */
    public function active(Request $request, jurnal $jurnal)
    {
        $active = Jurnal::where('status', 'active')->get();
        if ($active) {
            Jurnal::where('status', 'active')
                ->update(['status' => "nonaktif"]);
        }
        $jurnal->status = 'active';
        $jurnal->update();
        return redirect()->back()->with('info', 'Berhasil Mengupdate Status');
    }
    public function nonaktif(Request $request, jurnal $jurnal)
    {
        $jurnal->status = 'nonaktif';
        $jurnal->update();
        return redirect()->back()->with('info', 'Berhasil Mengupdate Status');
    }

    public function update(Request $request, jurnal $jurnal)
    {
        $jurnals = $request->all();
        $validator = Validator::make($jurnals, [
            'thumbnail' => 'max:1024|mimes:jpeg,jpg,png',
            'volume'      => 'numeric',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {
            if ($request->file('thumbnail')) {
                Storage::delete('img/jurnal/' . $jurnal->thumbnail); // menghapus gambar atau file
                $file_name = md5($request->ptitle . microtime()) . '.' . $request->thumbnail->extension();
                $request->thumbnail->storeAs('img/jurnal/', $file_name);
                $jurnals['thumbnail'] =  $file_name;
            }

            $jurnal->update($jurnals);
        }
        return redirect(Route('jurnal'))->with('info', 'Berhasil Mengupdate Jurnal');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jurnal  $jurnal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jurnal $jurnal)
    {   
        $lastjurnal =  Jurnal::orderBy('id','DESC')->first();
        Storage::delete('img/jurnal/' . $jurnal->thumbnail);


        $jurnal->delete();
        if ($jurnal->id == $lastjurnal->id ) {

            Jurnal::orderBy('id','DESC')->first()->update(['status' => "active"]);
        }
       
        return redirect()->back()->with('danger', 'Data Telah Dihapus');
    }
}
