@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Data Tracking
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
                                    <label for="">Positif</label>
                                    <input type="text" name="jml_positif" class="form-control" value="{{$tracking->jml_positif}}" required>
                                    @if($errors->has('jml_positif'))
                                <span class="text-danger">{{$errors->first('jml_positif')}}</span>
                            @endif
                                </div>
                                <div class="form-group">
                                    <label for="">Sembuh</label>
                                    <input type="text" name="jml_sembuh" class="form-control" value="{{$tracking->jml_sembuh}}" required>
                                    @if($errors->has('jml_sembuh'))
                                <span class="text-danger">{{$errors->first('jml_sembuh')}}</span>
                            @endif
                                </div>
                                <div class="form-group">
                                    <label for="">Meninggal</label>
                                    <input type="text" name="jml_meninggal" class="form-control" value="{{$tracking->jml_meninggal}}" required>
                                    @if($errors->has('jml_meninggal'))
                                <span class="text-danger">{{$errors->first('jml_meninggal')}}</span>
                            @endif
                                </div>
                                <div class="form-group">
                                    <label for="">Tanggal</label>
                                    <input type="date" name="tanggal" class="form-control" value="{{$tracking->tanggal}}" required>
                                    @if($errors->has('tanggal'))
                                <span class="text-danger">{{$errors->first('tanggal')}}</span>
                            @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection