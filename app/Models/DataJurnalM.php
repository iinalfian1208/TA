<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DataJurnalM extends Model
{
    use HasFactory;
    public function data()
    {
        return DB::table('t_jurnal');
    }
//     public function pt()
//     {
// return $this->belongsTo(DataPtM::class,'id_pt','id_pt');
//     }
}
