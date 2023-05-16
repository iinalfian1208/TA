<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataChats extends Model
{
    use HasFactory;
    protected $table = 't_chats';
    protected $fillable =[
        'sender_id',
        'id_chats',
        'receiver_id',
        'isi',
        'tanggal',
        'is_admin'
    ];

    protected $primaryKey = 'id_chats';


    public function sender()
    {
        return $this->belongsTo(DataAdminM::class, 'sender_id', 'id');
    }
    public function receiver()
    {
        return $this->belongsTo(DataAdminM::class, 'receiver_id', 'id');
    }
}

