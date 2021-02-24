<?php

namespace App\Http\Controllers;

use App\Models\Kelurahan;
use App\Models\Kecamatan;
use App\Http\Controllers\DB;
use Illuminate\Http\Request;

class KelurahanController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index()
    {
        $kelurahan = Kelurahan::with('kecamatan')->get();
        return view('admin.kelurahan.index',compact('kelurahan'));
    }

    public function create()
    {
        $kecamatan = Kecamatan::all();
        return view('admin.kelurahan.create',compact('kecamatan'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'nama_kel' => 'required|unique:kelurahans',
            ],
            [
                'nama_kel.required' => 'kelurahan harus diisi',
                'nama_kel.unique' => 'kelurahan telah terdaftar'
            ]
        );

        $kelurahan = new Kelurahan();
        $kelurahan->id_kel = $request->id_kel;
        $kelurahan->nama_kel = $request->nama_kel;
        $kelurahan->id_kec = $request->id_kec;
        $kelurahan->save();
        return redirect()->route('kelurahan.index')
                ->with(['message'=>'Data kelurahan berhasil dibuat']);
    }

    public function show($id)
    {
        $kecamatan = Kecamatan::all();
        $kelurahan = Kelurahan::findOrFail($id);
        return view('admin.kelurahan.show',compact('kelurahan','kecamatan'));
    }

    public function edit($id)
    {
        $kecamatan = Kecamatan::all();
        $kelurahan = Kelurahan::findOrFail($id);
        return view('admin.kelurahan.edit',compact('kelurahan','kecamatan'));

    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'nama_kel' => 'required:kelurahans'
            ],
            [
                'nama_kel.required' => 'kelurahan harus diisi'
            ]
        );

        $kelurahan = Kelurahan::findOrFail($id);
        $kelurahan->id_kel = $request->id_kel;
        $kelurahan->nama_kel = $request->nama_kel;
        $kelurahan->id_kec = $request->id_kec;
        $kelurahan->save();
        return redirect()->route('kelurahan.index')
                ->with(['message'=>'Data kelurahan berhasil diedit']);
    }

    public function destroy($id)
    {
        $kelurahan = Kelurahan::findOrFail($id)->delete();
        return redirect()->route('kelurahan.index')
                ->with(['message'=>'Data kelurahan berhasil dihapus']);
    }
}