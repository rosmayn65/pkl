@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Tambah Data Kecamatan
                </div>
                <div class="card-body">
                    
                    <form action="{{route('kecamatan.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Id Kota</label>
                            <select class="form-control" name="id_kota" required>
                                @foreach($kota as $data)
                                    <option value="{{$data->id}}">{{$data->nama_kota}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Kode Kecamatan</label>
                            <input type="text" name="kode_kec" class="form-control" required>
                            @if($errors->has('kode_kec'))
                                <span class="text-danger">{{$errors->first('kode_kec')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">Nama Kecamatan</label>
                            <input type="text" name="nama_kec" class="form-control" required>
                            @if($errors->has('nama_kec'))
                                <span class="text-danger">{{$errors->first('nama_kec')}}</span>
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