<?php

namespace App\Http\Controllers;

use App\Models\Tracking;
use App\Models\Rw;
use Illuminate\Http\Request;

class trackingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $tracking = tracking::with('rw.kelurahan.kecamatan.kota.provinsi')->orderBy('id','DESC')->get();
        // dd($tracking);
        return view('admin.tracking.index',compact('tracking'));
    }

    public function create()
    {
        $rw = Rw::all();
        return view('admin.tracking.create',compact('rw'));
    }

    public function store(Request $request)
    {
        //validasi 
        $request->validate([
            'rw' => 'required:tracking',
            'jml_positif' => 'required:tracking',
            'jml_sembuh' => 'required:tracking',
            'jml_meninggal' => 'required:tracking',
            'tanggal' => 'required:tracking'
        ],[
            'rw.required'=> 'id rw Harus diisi',
            'jml_positif.required'=> 'positif Harus diisi',
            'jml_sembuh.required'=> 'sembuh Harus diisi',
            'jml_meninggal.required'=> 'meninggal Harus diisi',
            'tanggal.required'=> 'tanggal Harus diisi',
        ]);
        
        $tracking = new tracking();
        $tracking->rw = $request->rw;
        $tracking->jml_positif = $request->jml_positif;
        $tracking->jml_sembuh = $request->jml_sembuh;
        $tracking->jml_meninggal = $request->jml_meninggal;
        $tracking->tanggal = $request->tanggal;
        $tracking->save();
        return redirect()->route('tracking.index');
    }

    public function show($id)
    {
        $tracking = tracking::findOrFail($id);
        return view('admin.tracking.show',compact('tracking'));
    }


    public function edit($id)
    {
        $rw = Rw::all();
        $tracking = tracking::findOrFail($id);
        return view('admin.tracking.edit',compact('tracking','rw'));
    }


    public function update(Request $request, $id)
    {
        $tracking = tracking::findOrFail($id);
        $tracking->rw = $request->rw;
        $tracking->jml_positif = $request->jml_positif;
        $tracking->jml_sembuh = $request->jml_sembuh;
        $tracking->jml_meninggal = $request->jml_meninggal;
        $tracking->tanggal = $request->tanggal;
        $tracking->save();
        return redirect()->route('tracking.index');
    }

    public function destroy($id)
    {
        $tracking = tracking::findOrFail($id);
        $tracking->delete();
        return redirect()->route('tracking.index');
    }
}