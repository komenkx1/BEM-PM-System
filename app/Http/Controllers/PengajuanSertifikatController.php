<?php

namespace App\Http\Controllers;

use App\Models\PengajuanSertifikat;
use Carbon\Carbon;
use Illuminate\Database\Events\TransactionBeginning;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PengajuanSertifikatController extends Controller
{
    public function index()
    {
        $pengajuans = PengajuanSertifikat::orderBy("id","DESC")->get();
        return view('admin.e-sertifikat.index', ['pengajuans' => $pengajuans]);
    }

    public function show(PengajuanSertifikat $pengajuans, Request $request)
    {   
        $pengajuans['file_excel_nama'] = Crypt::encrypt($pengajuans->file_excel_nama);
        $pengajuans['file_ttd_menteri'] = Crypt::encrypt($pengajuans->file_ttd_menteri);
        $pengajuans['hari_tanggal'] = Carbon::parse($pengajuans->hari_tanggal)->isoFormat('dddd, D MMMM Y');
// dd($pengajuans);
     if ($request->ajax()) {
        return response()->json($pengajuans);
     }
    }

    public function download($filename)
    {
        
        $file_path = '/home/bemudaya/public_html/e-sertif.bemudayana.id/public/storage/public/data/'. Crypt::decrypt($filename);
        // $file_path = 'D:\project\bem-unud-web-app\public/storage/data/'. Crypt::decrypt($filename);
        $file_name = explode("/", Crypt::decrypt($filename));
        // dd(Crypt::decrypt($filename));
        if(file_exists($file_path)) 
        {
            return response()->download($file_path, $file_name[1] , [
                'Content-Length: '.filesize($file_path)
            ]);
        }
        else {
            exit('Requsted file does not exist on our server');
        }
        
    }

    public function verifikasi(PengajuanSertifikat $pengajuans)
    {
      
        $pengajuans->update([
            "status" => 1
        ]);

        return redirect()->back()->with('info', 'Data Berhasil DI verifikasi');

    }

    public function destroy(PengajuanSertifikat $pengajuans)
    {
        DB::beginTransaction();
        unlink('/home/bemudaya/public_html/e-sertif.bemudayana.id/public/storage/public/data/'. $pengajuans->file_excel_nama);

        if ($pengajuans->file_ttd_menteri) {
            unlink('/home/bemudaya/public_html/e-sertif.bemudayana.id/public/storage/public/data/'. $pengajuans->file_ttd_menteri);
        };

        $pengajuans->delete();
        DB::commit();
        return redirect()->back()->with('danger', 'Data Telah Dihapus');

    }
}
