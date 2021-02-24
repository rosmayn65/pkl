<?php

namespace App\Http\Controllers;

use App\Models\rw;
use App\Models\kelurahan;
use Illuminate\Http\Request;

class RwController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index()
    {
        $rw = Rw::with('kelurahan')->get();
        return view('admin.rw.index',compact('rw'));
    }

    public function create()
    {
        $kelurahan = Kelurahan::all();
        return view('admin.rw.create',compact('kelurahan'));
    }

    public function store(Request $request)
    {
        //
        $request->validate(
            [
                'id_rw' => 'required|max:5|unique:rws',
                'rw' => 'required|unique:rws',
            ],
            [
                'id_rw.required' => 'Id Harus Diisi',
                'id_rw.unique' => 'Id Maksimal 5 Nomor',
                'id_rw.unique' => 'Id Sudah Dipakai',
                'rw.required' =>' nama rw Harus Diisi',
                'rw.unique' => 'Kode Sudah Dipakai',
            ]);

        $rw = new Rw();
        $rw->nama_kel = $request->nama_kel;
        $rw->id_rw = $request->id_rw;
        $rw->rw = $request->rw;
        $rw->save();
        return redirect()->route('rw.index')
                ->with(['message'=>'Data berhasil dibuat']);
    }

    public function show($id)
    {
        $rw = Rw::findOrFail($id);
        return view('admin.rw.show',compact('rw'));
    }

    public function edit($id)
    {
        $kelurahan = Kelurahan::all();
        $rw = Rw::findOrFail($id);
        return view('admin.rw.edit',compact('rw','kelurahan'));

    }

    public function update(Request $request, $id)
    {
        $rw = Rw::findOrFail($id);
        $rw->nama_kel = $request->nama_kel;
        $rw->id_rw = $request->id_rw;
        $rw->rw = $request->rw;
        $rw->save();
        return redirect()->route('rw.index')
                ->with(['message'=>'Data berhasil diedit']);
    }

    public function destroy($id)
    {
        $rw = Rw::findOrFail($id)->delete();
        return redirect()->route('rw.index')
                ->with(['message'=>'Data berhasil dihapus']);
    }
}