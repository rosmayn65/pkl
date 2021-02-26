@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                   Edit Data Kota
                </div>
                <div class="card-header">
                    <form action="{{route('kota.update',$kota->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="">Pilih Provinsi</label>
                            <select name="id_provinsi" id="" class="form-control">
                                @foreach($provinsi as $data)
                                    <option value="{{$data->id}}"
                                         {{$data->id == $kota->id_provinsi ? "selected" : "" }}>{{$data->nama_prov}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Kode Kota</label>
                            <input type="text" name="kode_kota" value="{{$kota->kode_kota}}" class="form-control" required>
                            @if ($errors->has('kode_kota'))
                                <span class="text-danger">{{$error->first('kode_kota')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">Nama Kota</label>
                            <input type="text" name="nama_kota" value="{{$kota->nama_kota}}" class="form-control" required>  
                            @if ($errors->has('nama_kota'))
                            <span class="text-danger">{{$error->first('nama_kota')}}</span>
                        @endif
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-outline-primary btn-lg btn-block">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection