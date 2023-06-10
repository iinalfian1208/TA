<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataSaran extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $primaryKey = 'idSaran ';
    protected $table = 't_saran';
    // public function data()
    // {
    //     return DB::table('t_saran');
    // }

    public function balas()
    {
        return $this->hasMany(DataBalasSaran::class, 'saran_id','idSaran');
    }
}
