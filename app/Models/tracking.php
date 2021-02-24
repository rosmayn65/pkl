<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tracking extends Model
{
    use HasFactory;

    protected $fillable = ['id_rw','jml_positif','jml_meninggal','jml_sembuh','tanggal'];
    public $timestamps = true;

    public function rw(){
        return $this->belongsTo('App\Models\Rw', 'id_rw');
    }

}
