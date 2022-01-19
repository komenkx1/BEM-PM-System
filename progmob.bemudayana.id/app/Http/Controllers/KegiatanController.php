<?php

namespace App\Http\Controllers;

use App\FCM;
use Illuminate\Http\Request;
use App\Kegiatan;
use App\User;

class KegiatanController extends Controller
{
    public function store(Request $request){
    	$kegiatan = new Kegiatan;
    	$kegiatan->id_user = $request->id_user;
    	$kegiatan->nama_kegiatan = $request->nama_kegiatan;
    	$kegiatan->bidang_kegiatan = $request->bidang_kegiatan;
    	$kegiatan->deskripsi_kegiatan = $request->deskripsi_kegiatan;
    	$kegiatan->tgl_kegiatan = $request->tgl_kegiatan;
		$kegiatan->save();

		$semua_user = FCM::all();
		$user = User::find($request->id_user);

		$title = $user->username;
		$body = "Membuat Kegiatan Baru : ".$kegiatan->nama_kegiatan;

		foreach($semua_user as $user_item){
			$fcm_token = $user_item->token;
			$res = FCM::cobaKirim($fcm_token, $title, $body);
			logger('fcm', [$res]);
		}

    	return response()->json(['success' => true, 'data' => $kegiatan]);
    }

    public function index(){
    	$kegiatan = Kegiatan::with('user')->orderby('tgl_kegiatan', 'desc')->get();
    	return response()->json(['data' => $kegiatan]);
    }

    public function getDataKegiatanUser($id){
    	$kegiatan = Kegiatan::where('id_user', $id)->orderby('id', 'desc')->get();
    	return response()->json(['data' => $kegiatan]);
    }

    public function updateKegiatan(Request $request, $id){
    	$kegiatan = Kegiatan::find($id);
    	$kegiatan->nama_kegiatan = $request->nama_kegiatan;
    	$kegiatan->bidang_kegiatan = $request->bidang_kegiatan;
    	$kegiatan->deskripsi_kegiatan = $request->deskripsi_kegiatan;
    	$kegiatan->tgl_kegiatan = $request->tgl_kegiatan;
    	$kegiatan->save();

    	return response()->json(['success' => true, 'data' => $kegiatan]);
    }

    public function delete($id){
    	$kegiatan = Kegiatan::find($id);
    	$kegiatan->delete();
    	return response()->json(['success' => true]);
    }
}
