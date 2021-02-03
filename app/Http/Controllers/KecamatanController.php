<?php

namespace App\Http\Controllers;

use App\Models\kecamatan;
use App\Models\kota;
use Illuminate\Http\Request;

class KecamatanController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index()
    {
        $kecamatan = Kecamatan::with('kota')->get();
        return view('admin.kecamatan.index',compact('kecamatan'));
    }

    public function create()
    {
        $kota = Kota::all();
        return view('admin.kecamatan.create',compact('kota'));
    }

    public function store(Request $request)
    {
        $kecamatan = new Kecamatan();
        $kecamatan->id_kota = $request->id_kota;
        $kecamatan->kode_kec = $request->kode_kec;
        $kecamatan->nama_kec = $request->nama_kec;
        $kecamatan->save();
        return redirect()->route('kecamatan.index')
                ->with(['message'=>'Data kecamatan berhasil dibuat']);
    }

    public function show($id)
    {
        $kota = Kota::all();
        $kecamatan = Kecamatan::findOrFail($id);
        return view('admin.kecamatan.show',compact('kecamatan','kota'));
    }

    public function edit($id)
    {
        $kota = Kota::all();
        $kecamatan = Kecamatan::findOrFail($id);
        return view('admin.kecamatan.edit',compact('kecamatan','kota'));

    }

    public function update(Request $request, $id)
    {
        $kecamatan = Kecamatan::findOrFail($id);
        $kecamatan->kode_kec = $request->kode_kec;
        $kecamatan->nama_kec = $request->nama_kec;
        $kecamatan->id_kota = $request->id_kota;
        $kecamatan->save();
        return redirect()->route('kecamatan.index')
                ->with(['message'=>'Data kecamatan berhasil diedit']);
    }

    public function destroy($id)
    {
        $kecamatan = Kecamatan::findOrFail($id)->delete();
        return redirect()->route('kecamatan.index')
                ->with(['message'=>'Data kecamatan berhasil dihapus']);
    }
}