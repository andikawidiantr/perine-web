<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    protected $table='tb_users';
    protected $fillable=['id_user','email','pass','nama_user','jenis_kelamin','role'];
    protected $primaryKey="id_user";
}
