<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use DB;
use App\Http\Models\Provinsi;
use App\Http\Models\Kota;
use App\Http\Models\Kecamatan;
use App\Http\Models\Kelurahan;
use App\Http\Models\Rw;
use App\Http\Models\Tracking;
use Illuminate\Support\Carbon;

class FrontendController extends Controller
{
    public function index()
    {
    // Count Up
    $positif = DB::table('trackings')
       ->('jml_positif'); 
   $sembuh = DB::table('trackings')
       ->('tjml_sembuh');
   $meninggal = DB::table('trackings')
       ->('jml_meninggal');
   $global = file_get_contents('https://api.kawalcorona.com/positif');
   $postglobal = json_decode($global, TRUE);

   // Date
   $tanggal = Carbon::now()->format('D d-M-Y');

   // Table Provinsi
   $tampil = DB::table('provinsis')
                  ->select('provinsis.id', 'provinsis.nama_prov', 'provinsis.kode_prov',
                      DB::raw('sum(trackings.jml_positif) as jml_positif'),
                      DB::raw('sum(trackings.jml_sembuh) as jml_sembuh'),
                      DB::raw('sum(trackings.jml_meninggal) as jml_meninggal'))
                  ->join('kotas', 'provinsis.id', '=', 'kotas.id_provinsi')
                  ->join('kecamatans', 'kotas.id', '=', 'kecamatans.id_kota')
                  ->join('kelurahans', 'kecamatans.id', '=', 'kelurahans.id_kec')
                  ->join('rws', 'kelurahans.id', '=', 'rws.id_kel')
                  ->join('trackings', 'rws.id', '=', 'trackings.id_rw')
                  ->groupBy('provinsis.id')
                  ->get();

   // Table Global
   $datadunia= file_get_contents("https://api.kawalcorona.com/");
   $dunia = json_decode($datadunia, true);
       
   return view('frontend.index',compact('positif','sembuh','meninggal','postglobal', 'tanggal','tampil','dunia'));
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