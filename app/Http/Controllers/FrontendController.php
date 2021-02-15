<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        $data = tracking::all();
        $provinsi = DB::table('provinsis')
                    ->select('provinsis.nama_prov',
                    DB::raw('SUM(trackings.jml_positif) as positif'),
                    DB::raw('SUM(trackings.jml_meninggal) as meninggal'),
                    DB::raw('SUM(trackings.jml_sembuh) as sembuh'))
                        ->join('kotas', 'provinsis.id', '=', 'kotas.id_provinsi')    
                        ->join('kecamatans', 'kotas.id', '=', 'kecamatans.id_kota')
                        ->join('kelurahans', 'kecamatans.id', '=', 'kelurahans.id_kec')
                        ->join('rws', 'kelurahans.id', '=', 'rws.id_kel')
                        ->join('trackings', 'rws.id', '=', 'trackings.id_rw')
                        ->groupBy('provinsis.id')
                        ->get();
                        return view('frontend.index', compact('data', 'provinsi'));
     }
}
