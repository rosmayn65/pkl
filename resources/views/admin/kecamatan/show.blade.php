@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Data kecamatan
                </div>
                <div class="card-body">
                        <div class="form-group">
                            <label for="">Id Kota</label>
                            <input type="text" name="{{$kecamatan->kota->id}}" class="form-control" value="{{$kecamatan->kota->nama_kota}}" readonly>  
                        </div>
                        <div class="form-group">
                            <label for="">Kode Kecamatan</label>
                            <input type="text" name="kode_kec" class="form-control" value="{{$kecamatan->kode_kec}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Nama Kecamatan</label>
                            <input type="text" name="nama_kec" class="form-control" value="{{$kecamatan->nama_kec}}" readonly>  
                        </div>
                        <div class="form-group">
                            <a href="{{url()->previous()}}" class="btn btn-outline-primary btn-lg btn-block">Kembali</a>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection