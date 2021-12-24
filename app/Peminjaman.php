<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $table='tb_peminjaman';
    protected $fillable=['id_peminjaman','id_user','id_buku','nama_user','nama_buku','tanggal_pinjam','tanggal_kembali','status'];
    protected $primaryKey="id_peminjaman";

}
