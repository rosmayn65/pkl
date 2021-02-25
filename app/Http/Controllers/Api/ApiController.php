<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Provinsi;
use App\Models\Rw;
use App\Models\Tracking;
use DB;

class ApiController extends Controller
{
    public function track()
    {
        $track = DB::table('trackings')
        ->select(
            DB::raw('SUM(jml_positif) as jml_positif'),
            DB::raw('SUM(jml_sembuh) as jml_sembuh'),
            DB::raw('SUM(jml_meninggal) as jml_meninggal'))
            ->join('rws','rws.id','=','trackings.id_rw')
            ->join('kelurahans','kelurahans.id','=','rws.id_kel')
            ->join('kecamatans','kecamatans.id','=','kelurahans.id_kec')
            ->join('kotas','kotas.id','=','kecamatans.id_kota')
            ->join('provinsis','provinsis.id','=','kotas.id_provinsi')
            ->get();
        $response = [
            'success' => true,
            'data' => [$track],
            'message' => 'Berhasil'
        ];
        return response()->json($response, 200);
    }
    public function provinsi()
    {
        $provinsi = DB::table('trackings')
                ->select(DB::raw('provinsis.nama_prov'), 
                DB::raw('provinsis.kode_prov'), 
                DB::raw('SUM(jml_positif) as jml_positif'), 
                DB::raw('SUM(jml_sembuh) as jml_sembuh'), 
                DB::raw('SUM(jml_meninggal) as jml_meninggal'))
    			->join('rws', 'rws.id', '=', 'trackings.id_rw')
    			->join('kelurahans', 'kelurahans.id', '=', 'rws.nama_kel')
    			->join('kecamatans', 'kecamatans.id', '=', 'kelurahans.id_kec')
    			->join('kotas', 'kotas.id', '=', 'kecamatans.id_kota')
    			->join('provinsis', 'provinsis.id', '=', 'kotas.id_provinsi')
    			->groupBy('provinsis.nama_prov')
                ->get();
        $harini = DB::table('trackings')
                ->select(DB::raw('provinsis.nama_prov'), 
                DB::raw('provinsis.kode_prov'), 
                DB::raw('SUM(jml_positif) as jml_positif'), 
                DB::raw('SUM(jml_sembuh) as jml_sembuh'), 
                DB::raw('SUM(jml_meninggal) as jml_meninggal'))
    			->join('rws', 'rws.id', '=', 'trackings.id_rw')
    			->join('kelurahans', 'kelurahans.id', '=', 'rws.nama_kel')
    			->join('kecamatans', 'kecamatans.id', '=', 'kelurahans.id_kec')
    			->join('kotas', 'kotas.id', '=', 'kecamatans.id_kota')
    			->join('provinsis', 'provinsis.id', '=', 'kotas.id_provinsi')
                ->wheredate('trackings.tanggal', date('Y-m-d'))
                ->get();
        $response = [
            'succes' => true,
            'data' => ['hari ini' => $harini,
            'total' => $provinsi],
            'message' => 'berhasil'
        ];
    	return response()->json($response, 200);
    }

 public function kota()
    {
        $kota = DB::table('trackings')
                ->select(DB::raw('kotas.nama_kota'), 
                DB::raw('kotas.kode_kota'), 
                DB::raw('SUM(jml_positif) as jml_positif'), 
                DB::raw('SUM(jml_sembuh) as jml_sembuh'), 
                DB::raw('SUM(jml_meninggal) as jml_meninggal'))
    			->join('rws', 'rws.id', '=', 'trackings.id_rw')
    			->join('kelurahans', 'kelurahans.id', '=', 'rws.id_kel')
    			->join('kecamatans', 'kecamatans.id', '=', 'kelurahans.id_kec')
    			->join('kotas', 'kotas.id', '=', 'kecamatans.id_kota')
    			->groupBy('kotas.nama_kota')
                ->get();
        $harini = DB::table('trackings')
                ->select(DB::raw('kotas.nama_kota'), 
                DB::raw('kotas.kode_kota'), 
                DB::raw('SUM(jml_positif) as jml_positif'), 
                DB::raw('SUM(jml_sembuh) as jml_sembuh'), 
                DB::raw('SUM(jml_meninggal) as jml_meninggal'))
    			->join('rws', 'rws.id', '=', 'trackings.id_rw')
    			->join('kelurahans', 'kelurahans.id', '=', 'rws.id_kel')
    			->join('kecamatans', 'kecamatans.id', '=', 'kelurahans.id_kec')
    			->join('kotas', 'kotas.id', '=', 'kecamatans.id_kota')
                ->wheredate('trackings.tanggal', date('Y-m-d'))
                ->get();
        $response = [
            'succes' => true,
            'data' => ['hari ini' => $harini,
            'total' => $kota],
            'message' => 'berhasil'
        ];
    	return response()->json($response, 200);
    }
   
 public function kecamatan()
    {
        $kecamatan = DB::table('trackings')
                ->select(DB::raw('kecamatans.nama_kec'), 
                DB::raw('kecamatans.kode_kec'), 
                DB::raw('SUM(jml_positif) as jml_positif'), 
                DB::raw('SUM(jml_sembuh) as jml_sembuh'), 
                DB::raw('SUM(jml_meninggal) as jml_meninggal'))
    			->join('rws', 'rws.id', '=', 'trackings.id_rw')
    			->join('kelurahans', 'kelurahans.id', '=', 'rws.id_kel')
    			->join('kecamatans', 'kecamatans.id', '=', 'kelurahans.id_kec')
    			->groupBy('kecamatans.nama_kec')
                ->get();
        $harini = DB::table('trackings')
                ->select(DB::raw('kecamatans.nama_kec'), 
                DB::raw('kecamatans.kode_kec'), 
                DB::raw('SUM(jml_positif) as jml_positif'), 
                DB::raw('SUM(jml_sembuh) as jml_sembuh'), 
                DB::raw('SUM(jml_meninggal) as jml_meninggal'))
    			->join('rws', 'rws.id', '=', 'trackings.id_rw')
    			->join('kelurahans', 'kelurahans.id', '=', 'rws.id_kel')
    			->join('kecamatans', 'kecamatans.id', '=', 'kelurahans.id_kec')
                ->wheredate('trackings.tanggal', date('Y-m-d'))
                ->get();
        $response = [
            'succes' => true,
            'data' => ['hari ini' => $harini,
            'total' => $kecamatan],
            'message' => 'berhasil'
        ];
    	return response()->json($response, 200);
    }

 public function kelurahan()
    {
        $kelurahan = DB::table('trackings')
                ->select(DB::raw('kelurahans.nama_kel'), 
                DB::raw('SUM(jml_positif) as jml_positif'), 
                DB::raw('SUM(jml_sembuh) as jml_sembuh'), 
                DB::raw('SUM(jml_meninggal) as jml_meninggal'))
    			->join('rws', 'rws.id', '=', 'trackings.id_rw')
    			->join('kelurahans', 'kelurahans.id', '=', 'rws.id_kel')
    			->groupBy('kelurahans.nama_kel')
                ->get();
        $harini = DB::table('trackings')
                ->select(DB::raw('kelurahans.nama_kel'), 
                DB::raw('SUM(jml_positif) as jml_positif'), 
                DB::raw('SUM(jml_sembuh) as jml_sembuh'), 
                DB::raw('SUM(jml_meninggal) as jml_meninggal'))
    			->join('rws', 'rws.id', '=', 'trackings.id_rw')
    			->join('kelurahans', 'kelurahans.id', '=', 'rws.id_kel')
                ->wheredate('trackings.tanggal', date('Y-m-d'))
                ->get();
        $response = [
            'succes' => true,
            'data' => ['hari ini' => $harini,
            'total' => $kelurahan],
            'message' => 'berhasil'
        ];
    	return response()->json($response, 200);
    }
    
 public function rw()
    {
        $rw = DB::table('trackings')
                ->select(DB::raw('rws.rw'), 
                DB::raw('SUM(jml_positif) as jml_positif'), 
                DB::raw('SUM(jml_sembuh) as jml_sembuh'), 
                DB::raw('SUM(jml_meninggal) as jml_meninggal'))
    			->join('rws', 'rws.id', '=', 'trackings.id_rw')
    			->groupBy('rws.rw')
                ->get();
        $harini = DB::table('trackings')
                ->select(DB::raw('rws.rw'), 
                DB::raw('SUM(jml_positif) as jml_positif'), 
                DB::raw('SUM(jml_sembuh) as jml_sembuh'), 
                DB::raw('SUM(jml_meninggal) as jml_meninggal'))
    			->join('rws', 'rws.id', '=', 'trackings.id_rw')
                ->wheredate('trackings.tanggal', date('Y-m-d'))
                ->get();
        $response = [
            'succes' => true,
            'data' => ['hari ini' => $harini,
            'total' => $rw],
            'message' => 'berhasil'
        ];
    	return response()->json($response, 200);
    }


    public function indonesia()
    {
        $indonesia = DB::table('trackings')
                ->select(
                DB::raw('SUM(jml_positif) as jml_positif'), 
                DB::raw('SUM(jml_sembuh) as jml_sembuh'), 
                DB::raw('SUM(jml_meninggal) as jml_meninggal'))
                ->get();
        $response = [
            'succes' => true,
            'data' => [$indonesia],
            'message' => 'berhasil'
        ];
    	return response()->json($response, 200);
    }

    public function positif()
    {
        $positif = DB::table('trackings')
                ->select(
                DB::raw('SUM(jml_positif) as jml_positif'))
                ->get();
        $response = [
            'succes' => true,
            'data' => [$positif],
            'message' => 'berhasil'
        ];
    	return response()->json($response, 200);
    }

    public function sembuh()
    {
        $sembuh = DB::table('trackings')
                ->select(
                DB::raw('SUM(jml_sembuh) as jml_sembuh'))
                ->get();
        $response = [
            'succes' => true,
            'data' => [$sembuh],
            'message' => 'berhasil'
        ];
    	return response()->json($response, 200);
    }

    public function meninggal()
    {
        $meninggal = DB::table('trackings')
                ->select(
                DB::raw('SUM(jml_meninggal) as jml_meninggal'))
                ->get();
        $response = [
            'succes' => true,
            'data' => [$meninggal],
            'message' => 'berhasil'
        ];
    	return response()->json($response, 200);
    }




    // berdasarkan id
}