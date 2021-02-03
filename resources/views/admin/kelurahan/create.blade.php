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
                    <form action="{{route('kelurahan.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Id Kelurahan</label>
                            <input type="text" name="id_kel" class="form-control" required>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Nama Kelurahan</label>
                            <input type="text" name="nama_kel" class="form-control" required>  
                        </div>
                        <div class="form-group">
                            <label for="">Nama Kecamatan</label>
                            <select class="form-control" name="id_kec" id="">
                                @foreach($kecamatan as $data)
                                    <option value="{{$data->id}}">{{$data->nama_kec}}</option>
                                @endforeach  
                            </select>
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