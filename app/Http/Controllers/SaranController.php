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

class SaranController extends Controller
{
    //
    public function index(){

        $data = DataSaran::where('is_admin', 'Salah')->orderBy('tanggal', 'DESC')->get();
        // $kode = $this->CekCaptcha();

        // return view('saran', ['data' => $data, 'kode' => $kode]);
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
    // public function CekCaptcha() {
    //     function acakCaptcha() {
    //         $kode = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    //         $pass = array();
    //         $panjangkode = strlen($kode) - 2;
    //         for ($i = 0; $i < 5; $i++) {
    //             $n = rand(0, $panjangkode);
    //             $pass[] = $kode[$n];
    //         }
    //         return implode($pass);
    //     }
    //     //hasil kode acak disimpan di $code
    //     $code = acakCaptcha();
    //     //kode acak disimpan di dalam session agar data dapat dipassing ke halaman lain
    //     Session::flash('codeCaptcha', $code);
    //     // dd($code);

    //     return $code;

    //     //membuat background
    //     // $wh = imagecreatetruecolor(173, 50);
    //     // $bgc = imagecolorallocate($wh, 22, 86, 165);
    //     //membuat text warna
    //     // $fc = imagecolorallocate($wh, 223, 230, 233);
    //     // imagefill($wh, 0, 0, $bgc);
    //     // imagestring($wh, 10, 50, 15,  $code, $fc);

    //     //membuat gambar
    //     // header('content-type: image/jpg');
    //     // imagejpeg($wh);
    //     // imagedestroy($wh);
    // }
}
