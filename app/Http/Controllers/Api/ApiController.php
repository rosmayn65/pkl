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
    public function Provinsi(){
        $provinsi = DB::table('provinsi')
        ->select('provinsi.nama_prov','provinsi.kode_prov',
            DB::raw('SUM(tracking.jml_positif) as Positif'),
            DB::raw('SUM(tracking.jml_sembuh) as Sembuh'),
            DB::raw('SUM(tracking.jml_meninggal) as Meninggal'))
            ->join('kota','provinsi.id','=','kotas.id_prov')
            ->join('kecamatan','kota.id','=','kecamatan.id_kota')
            ->join('kelurahan','kecamatan.id','=','kelurahan.id_kec')
            ->join('rw','kelurahan.id','=','rw.id_kel')
            ->join('tracking','rw.id','=','tracking.id_rw')
            ->groupBy('provinsi.id','tanggal')
            ->get();

        $positif = DB::table('rw')
                ->select('tracking.jml_positif',
                'tracking.jml_sembuh','tracking.jml_meninggal')
                ->join('tracking','rw.id','=','tracking.id_rw')
                ->sum('tracking.jml_positif');
        $sembuh = DB::table('rw')
                ->select('tracking.jml_positif',
                'tracking.jml_sembuh','tracking.jml_meninggal')
                ->join('tracking','rw.id','=','tracking.id_rw')
                ->sum('tracking.jml_sembuh');
        $meninggal = DB::table('rw')
                ->select('tracking.jml_positif',
                'tracking.jml_sembuh','tracking.jml_meninggal')
                ->join('tracking','rw.id','=','tracking.id_rw')
                ->sum('tracking.jml_meninggal');

        // dd($provinsi);
            return response([
            'success' => true,
            'data' => ['Hari Ini' => $provinsi,
            ],

            'Total' =>[
                'Jumlah Positif' => $positif,
                'Jumlah Sembuh' => $sembuh,
                'Jumlah Meninggal' => $meninggal,
            ],
                    
                'message' => 'Berhasil'
            ],200);

            // $data = [
            //     'status' => 200,
            //     'data' => $provinsi,
            //     'message' => 'Berhasil'
            // ];
            // return response()->json($data);
    }

    public function Rw()
    {
        $rw = DB::table('tracking')
                ->select([
                    DB::raw('SUM(tracking.jml_positif) as Positif'),
                    DB::raw('SUM(tracking.jml_sembuh) as Sembuh'),
                    DB::raw('SUM(tracking.jml_meninggal) as Meninggal'),
                ])
                ->groupBy('tanggal')->get();

        $positif = DB::table('rw')
                ->select('tracking.jml_positif',
                'tracking.jml_sembuh','tracking.jml_meninggal')
                ->join('tracking','rw.id','=','tracking.id_rw')
                ->sum('tracking.jml_positif');
        $sembuh = DB::table('rw')
                ->select('tracking.jml_positif',
                'tracking.jml_sembuh','tracking.jml_meninggal')
                ->join('tracking','rw.id','=','tracking.id_rw')
                ->sum('tracking.jml_sembuh');
        $meninggal = DB::table('rw')
                ->select('tracking.jml_positif',
                'tracking.jml_sembuh','tracking.jml_meninggal')
                ->join('tracking','rw.id','=','tracking.id_rw')
                ->sum('tracking.jml_meninggal');

             return response([
                'success' => true,
                'data' => ['Hari Ini' => $rw,
                          ],
                'Total' => ['Jumlah Positif'   => $positif,
                            'Jumlah Sembuh'    => $sembuh,
                            'Jumlah Meninggal' => $meninggal,
                          ],
                'message' => 'Berhasil'
            ], 200);
    }

    public function kota()
    {
        $kota = DB::table('kota')
                ->select('provinsi.nama_prov','kota.kode_kota','kota.nama_kota',
                DB::raw('SUM(tracking.jml_positif) as Positif'),
                DB::raw('SUM(tracking.jml_sembuh) as Sembuh'),
                DB::raw('SUM(tracking.jml_meninggal) as Meninggal'))
                ->join('provinsi','provinsi.id','=','kota.id_prov')
                ->join('kecamatan','kotas.id','=','kecamatan.id_kota')
                ->join('kelurahan','kecamatan.id','=','kelurahan.id_kec')
                ->join('rw','kelurahan.id','=','rw.id_kel')
                ->join('tracking','rw.id','=','tracking.id_rw')
                ->groupBy('kota.id')
                ->get();

        return response([
            'success' => true,
            'data' => $kota,
            'message' => 'Berhasil'
        ], 200);
    }

    public function kecamatan()
    {
        $kecamatan = DB::table('kecamatan')
                    ->select('kota.nama_kota','kecamatan.kode_kec','kecamatan.nama_kec',
                    DB::raw('SUM(tracking.jml_positif) as Positif'),
                    DB::raw('SUM(tracking.jml_sembuh) as Sembuh'),
                    DB::raw('SUM(tracking.jml_meninggal) as Meninggal'))
                    ->join('kota','kota.id','=','kecamatan.id_kota')
                    ->join('kelurahan','kecamatan.id','=','kelurahan.id_kec')
                    ->join('rw','kelurahan.id','=','rw.id_kel')
                    ->join('tracking','rw.id','=','tracking.id_rw')
                    ->groupBy('kota.id')
                    ->get();

        return response([
            'success' => true,
            'data' => $kecamatan,
            'message' => 'Berhasil'
        ], 200);
    }

    public function kelurahan()
    {
        $kelurahan = DB::table('kelurahan')
        ->select('kecamatan.nama_kec','kelurahan.nama_kel',
            DB::raw('SUM(tracking.jml_positif) as Positif'),
            DB::raw('SUM(tracking.jml_sembuh) as Sembuh'),
            DB::raw('SUM(tracking.jml_meninggal) as Meninggal'))
                ->join('kecamatan','kecamatan.id','=','kelurahan.id_kec')
                ->join('rw','kelurahan.id','=','rw.id_kel')
                ->join('tracking','rw.id','=','tracking.id_rw')
                ->groupBy('kelurahan.id')
                ->get();

        return response([
            'success' => true,
            'data'    => $kelurahan,
            'message' => 'Berhasil'
        ], 200);
    }

    public function positif()
    {
        $positif = DB::table('rw')
            ->select('tracking.jml_sembuh','tracking.jml_positif','tracking.jml_meninggal')
            ->join('tracking','rw.id','=','tracking.id_rw')
            ->sum('tracking.jml_positif');

        return response([
            'success' => true,
            'data' => 'Data Positif',
                      'Jumlah Positif' => $positif,       
            'message' => 'Berhasil'
        ], 200);
    }

    public function sembuh()
    {
        $sembuh = DB::table('rw')
              ->select('tracking.jml_sembuh','tracking.jml_positif','tracking.jml_meninggal')
              ->join('tracking','rw.id','=','tracking.id_rw')
              ->sum('tracking.jml_sembuh');

        return response([
            'success' => true,
            'data' => 'Data Sembuh',
                      'Jumlah Sembuh' => $sembuh,       
            'message' => 'Berhasil'
        ], 200);
    }

    public function meninggal()
    {
        $meninggal = DB::table('rw')
        ->select('tracking.jml_sembuh','tracking.jml_positif','tracking.jml_meninggal')
        ->join('tracking','rw.id','=','tracking.id_rw')
        ->sum('tracking.jml_meninggal');

        return response([
            'success' => true,
            'data' => 'Data Meninggal',
                      'Jumlah Meninggal' => $meninggal,       
            'message' => 'Berhasil'
        ], 200);
    }
    public function indonesia()
    {
        $positif = DB::table('rws')
              ->select('tracking.jml_sembuh','tracking.jml_positif','tracking.jml_meninggal')
              ->join('tracking','rw.id','=','tracking.id_rw')
              ->sum('trackings.jml_positif');
        $sembuh = DB::table('rw')
              ->select('tracking.jml_sembuh','tracking.jml_positif','tracking.jml_meninggal')
              ->join('tracking','rw.id','=','tracking.id_rw')
              ->sum('tracking.jml_sembuh');
        $meninggal = DB::table('rw')
              ->select('tracking.jml_sembuh','tracking.jml_positif','tracking.jml_meninggal')
              ->join('tracking','rw.id','=','tracking.id_rw')
              ->sum('tracking.jml_meninggal');

            return response([
                'success' => true,
                'data' => 'Data Indonesia',
                          'Jumlah Positif'   => $positif,
                          'Jumlah Sembuh'    => $sembuh,
                          'Jumlah Meninggal' => $meninggal,        
                'message' => 'Berhasil'
            ], 200);
    }
}