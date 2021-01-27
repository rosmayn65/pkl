<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rw extends Model
{
    use HasFactory;

    protected $fillable = ['id_kelurahan','nama'];
    public $timestamps = true;

    public function kelurahan(){
        return $this->belongsTo('App\Kelurahan','id_kelurahan');
    }
    
    public function rw(){
        return $this->hasMany('App\Tracking','id_tracking');
    }
}
