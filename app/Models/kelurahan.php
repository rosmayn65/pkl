<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kelurahan extends Model
{
    use HasFactory;

    protected $fillable = ['id_kec','nama_kel'];
    public $timestamps = true;

    public function kelurahan(){
        return $this->belongsTo('App/Models/kelurahan', 'id_prov');
    }

    public function rw(){
        return $this->hasMany('App/Models/kelurahan', 'id_prov');
    }
}
