<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NotifikasiPesanM;
use Illuminate\Support\Facades\Auth;

class NotifikasiPesanController extends Controller
{
    //
    public function deletepesan()
    {
        $not = NotifikasiPesanM::where('user_id', Auth::user()->id)->get();
        foreach ($not as $key) {

            $key->delete();
            # code...
        }


        return redirect()->back();
    }
}
