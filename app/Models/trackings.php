<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class trackings extends Model
{
    use HasFactory;

    protected $fillable = ['id_rw','positif','sembuh','meninggal','tanggal'];
    public $timestamps = true;

    public function rw(){
        return $this->belongsTo('App\Rw', 'id_rw');
    }

}
