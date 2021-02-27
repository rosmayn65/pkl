<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kelurahan extends Model
{
    use HasFactory;

    protected $fillable = ['id','id_kel','nama_kel','id_kec'];
    protected $table = "kelurahans";
    public $timestamps = true;

    public function kecamatan(){
        return $this->belongsTo('App\Models\kecamatan', 'id_kec');
    }

    public function rw(){
        return $this->hasMany('App\Models\rw', 'nama_kel');
    }
}
