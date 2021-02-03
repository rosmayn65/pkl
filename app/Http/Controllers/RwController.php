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
                'rw' => 'required|unique:rws'
            ],
            [
                'rw.required' => 'No Rw harus diisi',
                'rw.unique' => 'Rw telah terdaftar'
            ]
            );

        $rw = new Rw();
        $rw->id_rw = $request->id_rw;
        $rw->rw = $request->rw;
        $rw->id_kel = $request->id_kel;
        $rw->save();
        return redirect()->route('rw.index')
                ->with(['message'=>'Data rw berhasil dibuat']);
    }

    public function show($id)
    {
        $kelurahan = Kelurahan::all();
        $rw = Rw::findOrFail($id);
        return view('admin.rw.show',compact('rw','kelurahan'));
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
        $rw->rw = $request->rw;
        $rw->id_kel = $request->id_kel;
        $rw->save();
        return redirect()->route('rw.index')
                ->with(['message'=>'Data rw berhasil diedit']);
    }

    public function destroy($id)
    {
        $rw = Rw::findOrFail($id)->delete();
        return redirect()->route('rw.index')
                ->with(['message'=>'Data rw berhasil dihapus']);
    }
}