@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Data Kota
                </div>
                <div class="card-body">
                        <div class="form-group">
                            <label for="">Id Provinsi</label>
                            <input type="text" name="{{$kota->provinsi->id}}" class="form-control" value="{{$kota->provinsi->nama_provinsi}}" readonly>  
                        </div>
                        <div class="form-group">
                            <label for="">Kode Kota</label>
                            <input type="text" name="kode_kota" class="form-control" value="{{$kota->kode_kota}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Nama Kota</label>
                            <input type="text" name="nama_kota" class="form-control" value="{{$kota->nama_kota}}" readonly>  
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