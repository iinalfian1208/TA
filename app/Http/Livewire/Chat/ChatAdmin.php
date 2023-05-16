<?php

namespace App\Http\Livewire\Chat;

use Livewire\Component;
use App\Models\DataChats;
use App\Models\DataAdminM;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class ChatAdmin extends Component
{
    public $isi;
    public function render()
    {
        return view('livewire.chat.chat-admin')->extends('admin.template')->section('ChatSP');
    }

    public function kirim()
    {
        $this->validate([
            'isi' => 'required',
        ]);

        $admin = DataAdminM::where('userRole', 'admin')->first();
        DataChats::create([
            'id_chats' => Str::random(8),
            'isi' => $this->isi,
            'sender_id' => Auth::user()->idUser,
            'receiver_id' => $admin->idUser,
            'tanggal' => Carbon::now('Asia/Jakarta')->format('d-m-Y H:i:s'),
        ]);


        $this->isi = '';
    }
}
