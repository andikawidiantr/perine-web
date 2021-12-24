<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class buku extends Model
{
    protected $table='tb_buku';
    protected $fillable=['id_buku','buku','penulis','jenis','penerbit'];
    protected $primaryKey="id_buku";

}
