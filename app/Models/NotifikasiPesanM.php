<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotifikasiPesanM extends Model
{
    use HasFactory;
    protected $table = 't_notif_pesan';
    protected $fillable =[
        'id_notif_pesan',
        'keterangan',
        'tanggal',
        'user_id',
        'updated_at',
        'created_at',
        'nama',

    ];
    protected $primaryKey = 'id_notif_pesan';


    public function user()
    {
        return $this->belongsTo(DataAdminM::class, 'user_id', 'id');
    }
}
