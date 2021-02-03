<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kecamatan extends Model
{
    use HasFactory;
     
    protected $fillable = ['kode_kec','nama_kec','id_kota'];
    protected$table='kecamatans';
    public $timestamps = true;

    public function kota()
    {
        return $this->belongsTo(Kota::class,'id_kota');
    }

    public function kelurahan()
    {
        return $this->hasMany(Kelurahan::class);
    }
}