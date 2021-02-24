<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rw extends Model
{
    use HasFactory;

    protected $fillable = ['id','nama_kel','id_rw','rw'];
    public $timestamps = true;

    public function kelurahan(){
        return $this->belongsTo('App\Models\kelurahan','nama_kel');
    }
    
    public function rw(){
        return $this->hasMany('App\Models\Tracking','id_tracking');
    }
}
