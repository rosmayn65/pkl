@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Edit Data Tracking
                </div>
                <div class="card-body">
                    <form action="{{route('tracking.update',$tracking->id)}}" method="post">
                        @csrf @method('put')
                        <div class="row">
                            <div class="col">
                                @livewire('dropdowns',['selectedRw'=>$tracking->id_rw,'selectedKelurahan'=>$tracking->rw->id_kel,
                                            'selectedKecamatan'=>$tracking->rw->kelurahan->id_kec,
                                            'selectedKota'=>$tracking->rw->kelurahan->kecamatan->id_kota,
                                            'selectedProvinsi'=>$tracking->rw->kelurahan->kecamatan->kota->id_provinsi])
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Jumlah Positif</label>
                                    <input type="text" name="jml_positif" class="form-control" value="{{$tracking->jml_positif}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Jumlah Sembuh</label>
                                    <input type="text" name="jml_sembuh" class="form-control" value="{{$tracking->jml_sembuh}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Jumlah Meninggal</label>
                                    <input type="text" name="jml_meninggal" class="form-control" value="{{$tracking->jml_meninggal}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Tanggal</label>
                                    <input type="date" name="tanggal" class="form-control" value="{{$tracking->tanggal}}" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
