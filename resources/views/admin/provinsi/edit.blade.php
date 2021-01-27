@extends('layouts.master')

@section('content')
<div class="container">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Edit Data Provinsi
            </div>
            <div class="card-header">
            <form action="{{route('provinsi.update', $provinsi->id)}}" method="POST">
            @csrf
            @method('PUT')
                <div class="form-group">
                    <label for="">Kode Provinsi</label>
                    <input type="text" name="kode_prov" class="form-control" value="{{($provinsi->kode_prov)}}" required>
                </div>
                <div class="form-group">
                    <label for="">Nama Provinsi</label>
                    <input type="text" name="nama_prov" class="form-control" value="{{($provinsi->nama_prov)}}" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-outline-primary btn-lg btn-block">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
