<?php

namespace App\Http\Controllers;

use App\Models\trackings;
use Illuminate\Http\Request;

class TrackingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tracking = Tracking::with('rw.kelurahan.kecamatan.kota.provinsi')->get();
        return view('admin.tracking.index',compact('tracking'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tracking.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tracking = new Tracking;
        $tracking -> nama = $request->nama;
        $tracking -> jumlah_positif = $request->jumlah_positif;
        $tracking -> jumlah_sembuh = $request->jumlah_sembuh;
        $tracking -> jumlah_meninggal = $request->jumlah_meninggal;
        $tracking -> tanggal = $request->tanggal;
        $tracking ->save();
        return redirect()->route('tracking.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tracking  $tracking
     * @return \Illuminate\Http\Response
     */
    public function show(Tracking $tracking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tracking  $tracking
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $tracking = Tracking::findOrFail($id);
        return view('admin.tracking.edit',compact('tracking'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tracking  $tracking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $tracking = Tracking::findOrFail($id);
        $tracking -> nama = $request->nama;
        $tracking -> jumlah_positif = $request->jumlah_positif;
        $tracking -> jumlah_sembuh = $request->jumlah_sembuh;
        $tracking -> jumlah_meninggal = $request->jumlah_meninggal;
        $tracking -> tanggal = $request->tanggal;
        $tracking ->save();
        return redirect()->route('tracking.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tracking  $tracking
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $tracking = Tracking::findOrFail($id);
        $tracking->delete();
        return redirect()->route('tracking.index');
    }
}