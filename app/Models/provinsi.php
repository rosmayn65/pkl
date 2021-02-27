<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class provinsi extends Model
{
    use HasFactory;

    protected $fillable = ['id','kode_prov','nama_prov'];
    public $timestamps = true;
    protected $table = "provinsis";

    public function kota(){

        return $this->hasMany('App/Models/Provinsi','id_prov');
    }
}
