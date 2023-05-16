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
    ];
}
