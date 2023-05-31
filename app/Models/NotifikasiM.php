<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotifikasiM extends Model
{
    use HasFactory;
    protected $table = 't_notif';
    protected $fillable =[
        'id_notifikasi',
        'keterangan',
        'tanggal',
        'user_id',
        'updated_at',
        'created_at',

    ];
    protected $primaryKey = 'id_notifikasi';


    public function user()
    {
        return $this->belongsTo(DataAdminM::class, 'user_id', 'id');
    }
}
