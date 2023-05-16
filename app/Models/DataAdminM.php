<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DataAdminM extends Model
{
    use HasFactory;

    public function data()
    {
        return DB::table('t_admin');
    }
    protected $guarded = ['id'];
    protected $primaryKey = 'id';
    protected $table = 't_admin';

public function userToChat()
    {
        return $this->hasMany(DataChats::class, 'idUser');
    }

    public function userToKomentar()
    {
        return $this->hasMany(Komentar::class, 'idUser');
    }

}
