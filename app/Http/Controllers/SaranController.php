<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\DataSaran;
use App\Models\DataAdminM;
// use Illuminate\Support\Facades\Hash;
use App\Models\NotifikasiM;
use Illuminate\Http\Request;
use App\Models\DataBalasSaran;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class SaranController extends Controller
{
    //
    // public function __construct()
    // {
    //     $this->middleware('auth');
    //     $this->model = new DataSaran();
    // }
    
    public function index(){

        $data = DataSaran::where('is_admin', 'Salah')->orderBy('tanggal', 'DESC')->get();
        // $kode = $this->CekCaptcha();

        return view('saran', ['data' => $data]);


    }
    public function adminSaran(){

        $data = DataSaran::where('is_admin', 'Salah')->orderBy('tanggal', 'DESC')->get();

        return view('admin.saran', ['data' => $data]);

    }


    public function saran(Request $request)
    {
        // if($request->xcd == $request->kode) {
            $this->validate($request,[
                // 'idSaran'=>'required',
                'isi'=>'required',
                'nama_penulis' => 'required',
                'review'=>'required',
                'captcha' => ['required','captcha'],
            ]);
            $saran = DataSaran::create([
                // 'idSaran' => $request->idSaran,
                'isi' => $request->isi,
                'nama_penulis' => $request->nama_penulis,
                'is_admin'=>'salah',
                'tanggal'=> Carbon::now(),
                'review' => $request->review,
            ]);

            $penerima = DataAdminM::where('level','1')->first();
            NotifikasiM::create([
                'user_id' => $penerima->id,
                'keterangan' => $request->nama_penulis. ' Memberikan Saran Untuk Anda' ,
                'jadwal' => Carbon::now()
            ]);

            if ($saran) {
                return redirect()->route('tampil')->with('success', 'Terimakasih ' .$request->nama_penulis. ' Atas Saran Anda');
            } else {
                return redirect()->route('tampil')->with('error', 'Maaf ' .$request->nama_penulis. ' Saran Anda Gagal Terkirim');

        }
    }

    public function balasSaran(Request $request)
    {
        $input= $request->validate([
            'balas'=>'required',
        ]);
        $balassaran = DataBalasSaran::create([
            // 'nama_admin' => $request->nama_admin,

            'saran_id'=>$request->id_saran,
            'balas' => $request->balas,
            'tanggal'=> Carbon::now(),
        ]);
        if ($balassaran) {
            return redirect()->route('tampil1')->with('success', 'Saran Berhasil Di Balas');
        } else {
            return redirect()->route('tampil1')->with('error', 'Saran Gagal Dibalas');
        }
    }
    public function reloadCaptcha()
    {
        return response()->json(['captcha'=> captcha_img('math' )]);
    }

    public function delete($kode)
    {
        DB::table('t_saran')->where('idSaran', $kode)->delete();
        return back()->with('success', 'Berhasil Menghapus Data Saran');
    }

}
