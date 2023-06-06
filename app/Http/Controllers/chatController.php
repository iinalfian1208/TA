<?php

namespace App\Http\Controllers;

use App\Models\DataChats;
use App\Models\DataAdminM;
use App\Models\NotifikasiM;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\NotifikasiPesanM;
use Illuminate\Support\Facades\Auth;

class chatController extends Controller
{
    public function index()
    {
        $pesan = DataChats::orWhere('sender_id', Auth::user()->id)->orWhere('receiver_id', Auth::user()->id)->orderBy('tanggal', 'ASC')->get();
        $super = DataAdminM::where('level',1)->first();
        $pengirimUser = $super->id;

        return view('admin.chatAdmin',['pesan'=>$pesan,'pengirimUser'=>$pengirimUser]);
    }

    public function kirim(Request $request)
    {
    if (Auth::user()->level == 1) {

        DataChats::create([
            'sender_id'=>Auth::user()->id,
            // 'id_chats' =>Str::random(8),
            'receiver_id'=>$request->id,
            'isi' => $request->isi,
            'tanggal'=>Carbon::now(),
            'is_admin'=>'Benar',
            ]);
            NotifikasiPesanM::create([
                'user_id' => $request->id,
                'keterangan' => $request->nama_penulis. ' Mengirim Chat Untuk Anda' ,
                'jadwal' => Carbon::now(),
                'nama' =>Auth::user()->nama_admin
            ]);

    return redirect()->route('balas-chat',$request->id);

    }else{

        $pengirim = DataAdminM::where('level',1)->first();
        NotifikasiPesanM::create([
            'user_id' => $pengirim->id,
            'keterangan' => $request->nama_penulis. ' Mengirim Chat Untuk Anda' ,
            'jadwal' => Carbon::now(),
            'nama' =>Auth::user()->nama_admin
        ]);

        DataChats::create([
        'sender_id'=>Auth::user()->id,
        // 'id_chats' =>Str::random(8),
        'receiver_id'=>$pengirim->id,
        'isi' => $request->isi,
        'tanggal'=>Carbon::now(),
        'is_admin'=>'Salah',
        ]);

        return redirect()->route('chat-admin');

    }

    }

    public function daftarChat( )
    {
        $pesan = DataChats::where('is_admin', 'Salah')->orderBy('tanggal', 'DESC')->get();

        return view('admin.chatSP',compact(['pesan']));

    }

    public function chat($id)
    {
        $pesan = DataChats::orWhere('sender_id', $id)->orWhere('receiver_id', $id)->orderBy('tanggal', 'ASC')->get();
        $pengirimUser = $id;
        return view('admin.chatAdmin',['pesan'=>$pesan,'pengirimUser'=>$pengirimUser]);
    }
}
