<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rw extends Model
{
    use HasFactory;

    protected $fillable = ['id_rw','rw','id_kel'];
    public $timestamps = true;

    public function kelurahan(){
        return $this->belongsTo('App\Models\kelurahan','id_kel');
    }
    
    public function rw(){
        return $this->hasMany('App\Models\Tracking','id_tracking');
    }
}
