@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Tambah Data Kelurahan
                </div>
                <div class="card-body">
                    <form action="{{route('kelurahan.update',$kelurahan->id)}}" method="post">
                    <!-- <input type="hidden" name="_method" value="PUT"> -->
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="">Id Kelurahan</label>
                            <input type="text" name="id_kel" class="form-control" value="{{$kelurahan->id_kel}}" required>
                            
                        </div>
                        <div class="form-group">
                            <label for="">Nama Kelurahan</label>
                            <input type="text" name="nama_kel" class="form-control" value="{{$kelurahan->nama_kel}}" required>
                        </div>
                        <div class="form-group">
                            <label for="">Nama Kecamatan</label>
                            <select name="id_kec" class="form-control">
                            @foreach($kecamatan as $data)
                            <option value="{{$data->id}}"
                            {{$data->id == $kelurahan->id_kec ? "selected": ""}}>{{$data->nama_kec}}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-outline-primary btn-lg btn-block" onclick="return confirm('Apakah anda yakin?')">Simpan</button>
                        </div>
                        <div class="form-group">
                            <a href="{{url()->previous()}}" class="btn btn-outline-secondary btn-lg btn-block">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection