<?php

namespace App\Http\Controllers;

use App\Models\NotifikasiM;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotifikasiController extends Controller
{

        public function delete()
        {
            $not = NotifikasiM::where('user_id', Auth::user()->id)->get();
            foreach ($not as $key) {

                $key->delete();
                # code...
            }


            return redirect()->back();
        }
       


}
