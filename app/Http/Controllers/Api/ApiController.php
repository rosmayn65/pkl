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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Rw()
    {

        $rw = DB::table('tracking')->select([
            DB::raw('SUM(jml_positif) as Positif'),
            DB::raw('SUM(jml_sembuh) as Sembuh'),
            DB::raw('SUM(jml_meninggal) as Meninggal'),
        ])
        ->groupBy('tanggal')->get()';

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
                        'data'    => [Hari Ini => $rw,
                    ],
                        'Total' => ['Jumlah Positif' => $positif,
                        'Jumlah Sembuh' => $sembuh,
                        'Jumlah Meninggal' => meninggal,
                    ],
                        'message' => 'Berhasil'
                    ],200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
