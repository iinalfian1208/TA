<?php

namespace App\Http\Controllers;

use App\Models\NotifikasiM;
use Illuminate\Http\Request;

class NotifikasiController extends Controller
{

        public function delete()
        {
            $not = NotifikasiM::all();
            foreach ($not as $key) {

                $key->delete();
                # code...
            }


            return redirect()->back();
        }

}
