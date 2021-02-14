<?php

namespace App\Http\Controllers;

use App\Models\provinsi;
use Illuminate\Http\Request;

class ProvinsiController extends Controller
{
    public function index()
    {
        $provinsi = Provinsi::all();
        return view('admin.provinsi.index',compact('provinsi'));
    }

    public function create()
    {
        return view('admin.provinsi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_prov' => 'required|unique:provinsis',
            'nama_prov' => 'required|unique:provinsis',
        ], [
            'kode_prov.required' => 'Kode provinsi harus diisi',
            'kode_prov.unique' => 'Kode provinsi telah terdaftar',
            'nama_prov.required' => 'Provinsi harus diisi',
            'nama_prov.unique' => 'Provinsi telah terdaftar'
        ]);

        $provinsi = new Provinsi();
        $provinsi->kode_prov = $request->kode_prov;
        $provinsi->nama_prov = $request->nama_prov;
        $provinsi->save();
        return redirect()->route('provinsi.index');
    }

    public function show($id)
    {
        $provinsi = Provinsi::findOrfail($id);
        return view('admin.provinsi.show', compact('provinsi'));
    }

    public function edit($id)
    {
        $provinsi = Provinsi::findOrfail($id);
        return view('admin.provinsi.edit', compact('provinsi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_prov' => 'required|unique:provinsis',
            'nama_prov' => 'required|unique:provinsis',
        ], [
            'kode_prov.required' => 'Kode provinsi harus diisi',
            'kode_prov.unique' => 'Kode provinsi telah terdaftar',
            'nama_prov.required' => 'Provinsi harus diisi',
            'nama_prov.unique' => 'Provinsi telah terdaftar'
        ]);

        $provinsi = Provinsi::findOrfail($id);
        $provinsi->kode_prov = $request->kode_prov;
        $provinsi->nama_prov = $request->nama_prov;
        $provinsi->save();
        return redirect()->route('provinsi.index')
            ->with(['message'=>'Data provinsi berhasil diedit!']);
    }

    public function destroy(Provinsi $provinsi)
    {
        $provinsi = Provinsi::findOrFail($id)->delete();
        return redirect()->route('provinsi.index')
                ->with(['message'=>'Provinsi berhasil dihapus']);
    }
}
