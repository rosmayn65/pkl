<?php

namespace App\Http\Controllers;
use App\Http\Controllers\DB;
use App\Models\Kota;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Rw;
use App\Models\Tracking;
use Illuminate\Http\Request;

class TrackingController extends Controller
{
    public function index()
    {
       $tracking = Tracking::with('rw.kelurahan.kecamatan.kota.provinsi')->get();
       //dd($tracking);
       return view('admin.tracking.index',compact('tracking'));
    }

    public function create()
    {
        $rw = Rw::all();
        return view('admin.tracking.create',compact('rw'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'jml_positif' => 'required:trackings',
            'jml_sembuh' => 'required:trackings',
            'jml_meninggal' => 'required:trackings',
            'tanggal' => 'required:trackings'
        ], [
            'jml_positif.required' => 'Jumlah pasien sembuh harus diisi',
            'jml_sembuh.required' => 'Jumlah pasien sembuhharus diisi',
            'jml_meninggal.required' => 'Jumlah pasien meninggal harus diisi',
            'tanggal.required' => 'Tanggal harus diisi',
        ]);
        $tracking = new Tracking();
        $tracking->id_rw = $request->id_rw;
        $tracking->jml_positif = $request->jml_positif;
        $tracking->jml_sembuh = $request->jml_sembuh;
        $tracking->jml_meninggal = $request->jml_meninggal;
        $tracking->tanggal = $request->tanggal;
        $tracking->save();
        return redirect()->route('tracking.index');
    }

    public function show($id)
    {
        $tracking = Tracking::findOrFail($id);
        return view('admin.tracking.show',compact('tracking'));
    }


    public function edit($id)
    {
        #rw = Rw::all();
        $tracking = Tracking::findOrFail($id);
        return view('admin.tracking.edit',compact('tracking'));
    }


    public function update(Request $request, $id)
    {

        $tracking = Tracking::findOrFail($id);
        $tracking->id_rw = $request->id_rw;
        $tracking->jml_positif = $request->jml_positif;
        $tracking->jml_sembuh = $request->jml_sembuh;
        $tracking->jml_meninggal = $request->jml_meninggal;
        $tracking->tanggal = $request->tanggal;
        $tracking->save();
        return redirect()->route('tracking.index');
    }

    public function destroy($id)
    {
        $tracking = Tracking::findOrFail($id);
        $tracking->delete();
        return redirect()->route('tracking.index');
    }
}