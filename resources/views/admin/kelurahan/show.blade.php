@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Data Kelurahan
                </div>
                <div class="card-body">
                <div class="form-group">
                            <label for="">Id Kelurahan</label>
                            <input type="number" name="id_kel" class="form-control" value="{{$kelurahan->id_kel}}" readonly>  
                        </div>
                        <div class="form-group">
                            <label for="">Nama Kelurahan</label>
                            <input type="text" name="nama_kel" class="form-control" value="{{$kelurahan->nama_kel}}" readonly>
                        </div>
                        <label for="">Nama Kelurahan</label>
                         <select name="id_kec" class="form-control">
                            @foreach($kecamatan as $data)
                            <option value="{{$data->id}}"
                            {{$data->id == $kelurahan->id_kec ? "selected": ""}}>{{$data->nama_kec}}</option>
                            @endforeach
                            </select>
                        <div class="form-group">
                            <a href="{{url()->previous()}}" class="btn btn-outline-primary btn-lg btn-block">Kembali</a>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection