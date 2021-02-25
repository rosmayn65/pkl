<?php

namespace App\Http\Controllers;

use App\Models\Kota;
use App\Models\Provinsi;
use App\Http\Controller\DB;
use Illuminate\Http\Request;

class KotaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $kota = Kota::with('provinsi')->get();
        return view('admin.kota.index', compact('kota'));
    }

    public function create()
    {
        $provinsi = Provinsi::all();
        return view('admin.kota.create', compact('provinsi'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_kota' => 'required|unique:kotas',
            'nama_kota' => 'required|unique:kotas',
        ], [
            'kode_kota.required' => 'Kode kota harus diisi',
            'kode_kota.unique' => 'Kode kota telah terdaftar',
            'nama_kota.required' => 'Kota harus diisi',
            'nama_kota.unique' => 'Kota telah terdaftar'
        ]);

        $kota = new Kota();
        $kota->kode_kota = $request->kode_kota;
        $kota->nama_kota = $request->nama_kota;
        $kota->id_provinsi = $request->id_provinsi;
        $kota->save();
        return redirect()->route('kota.index');
    }

    public function show($id)
    {
        $kota = Kota::findOrFail($id);
        return view('admin.kota.show', compact('kota'));
    }

    public function edit($id)
    {
        $kota = Kota::findOrFail($id)->with('provinsi')->first();
        $provinsi = Provinsi::all();
        return view('admin.kota.edit', compact('kota','provinsi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_kota' => 'required|unique:kotas',
            'nama_kota' => 'required|unique:kotas',
        ], [
            'kode_kota.required' => 'Kode kota harus diisi',
            'kode_kota.unique' => 'Kode kota telah terdaftar',
            'nama_kota.required' => 'Kota harus diisi',
            'nama_kota.unique' => 'Kota telah terdaftar'
        ]);

        $kota = Kota::findOrFail($id);
        $kota->kode_kota = $request->kode_kota;
        $kota->nama_kota = $request->nama_kota;
        $kota->save();
        return redirect()->route('kota.index');
    }

    public function destroy($id)
    {
        $kota = Kota::findOrFail($id)->delete();
        return redirect()->route('kota.index');
    }
}