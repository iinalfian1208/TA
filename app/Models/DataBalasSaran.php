<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataBalasSaran extends Model
{
    use HasFactory;
    protected $guarded = ['idBalasSaran '];
    protected $primaryKey = 'idBalasSaran ';
    protected $table = 't_balas_saran';
    public function data()
    {
        return DB::table('t_balas_saran');
    }
    public function sender()
    {
        return $this->belongsTo(DataSaran::class, 'saran_id', 'idSaran');
    }
}
