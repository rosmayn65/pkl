<?php

namespace App\Http\Controllers;

use App\Models\rw;
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
        $rw = new Rw();
        $rw->nama = $request->nama;
        $rw->id_kelurahan = $request->id_kelurahan;
        $rw->save();
        return redirect()->route('rw.index')
                ->with(['message'=>'DATA RW BERHASIL ANDA BUAT']);
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
        $rw->nama = $request->nama;
        $rw->id_kelurahan = $request->id_kelurahan;
        $rw->save();
        return redirect()->route('rw.index')
                ->with(['message'=>'DATA RW BERHASIL ANDA EDIT']);
    }

    public function destroy($id)
    {
        $rw = Rw::findOrFail($id)->delete();
        return redirect()->route('rw.index')
                ->with(['message'=>'DATA RW BERHASIL ANDA HAPUS']);
    }
}