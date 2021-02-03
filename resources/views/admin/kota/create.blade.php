@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Tambah Data Kota
                </div>
                <div class="card-body">

            <form action="{{route('kota.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="">Id Provinsi</label>
                    <select class="form-control" name="id_provinsi" id="">
                    @foreach($provinsi as $data)
                    <option value="{{$data->id}}">{{$data->nama_prov}}</option>
                    @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Kode Kota</label>
                    <input type="text" name="kode_kota" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Nama Kota</label>
                    <input type="text" name="nama_kota" class="form-control" required>
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
