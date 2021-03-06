@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Edit Data Rw
                </div>
                <div class="card-body">
                    <form action="{{route('rw.update',$rw->id)}}" method="post">
                    <!-- <input type="hidden" name="_method" value="PUT"> -->
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="">Nama Kelurahan</label>
                            <select name="nama_kel" class="form-control">
                            @foreach($kelurahan as $data)
                            <option value="{{$data->id}}"
                            {{$data->id == $rw->id_kelurahan ? "selected": ""}}>{{$data->nama_kel}}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Id Rw</label>
                            <input type="text" name="id_rw" class="form-control" value="{{$rw->id_rw}}" required>  
                        </div>
                        <div class="form-group">
                            <label for="">Rw</label>
                            <input type="text" name="rw" class="form-control" value="{{$rw->rw}}" required>  
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-outline-primary btn-lg btn-block" onclick="return confirm('Apakah anda yakin?')">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection