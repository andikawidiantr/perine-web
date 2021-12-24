<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    protected $table='tb_users';
    protected $fillable=['id_user','email','pass','nama_user','tanggal_lahir','jenis_kelamin','role'];
    protected $primaryKey="id_user";
}
