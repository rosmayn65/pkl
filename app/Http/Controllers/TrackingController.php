<?php

namespace App\Http\Controllers;

use App\Models\Tracking;
use App\Models\Rw;
use App\Http\Controllers\DB;
use Illuminate\Http\Request;

class TrackingController extends Controller
{
    public function index()
    {
       $tracking = Tracking::with('rw.kelurahan.kecamatan.kota.provinsi')->get();
       return view('admin.tracking.index',compact('tracking'));
    }

    public function create()
    {
        return view('admin.tracking.create');
    }

    public function store(Request $request)
    {
        
        $tracking = new Tracking;
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
        $tracking = Tracking::findOrFail($id);
        return view('admin.tracking.edit',compact('tracking'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'jml_positif' => 'required:tracking',
            'jml_sembuh' => 'required:tracking',
            'jml_meninggal' => 'required:tracking',
            'tanggal' => 'required:tracking'
        ],[
            'jml_positif.required'=> 'Data Harus diisi',
            'jml_sembuh.required'=> 'Data Harus diisi',
            'jml_meninggal.required'=> 'Data Harus diisi',
            'tanggal.required'=> 'Tanggal Harus diisi',
        ]);

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