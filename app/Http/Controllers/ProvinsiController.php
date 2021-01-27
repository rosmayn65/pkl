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
        $provinsi = Provinsi::findOrfail($id);
        $provinsi->kode_prov = $request->kode_prov;
        $provinsi->nama_prov = $request->nama_prov;
        $provinsi->save();
        return redirect()->route('provinsi.index');
    }

    public function destroy(Provinsi $provinsi)
    {
        $provinsi->delete();
        return redirect()->route('provinsi.index');

    }
}
