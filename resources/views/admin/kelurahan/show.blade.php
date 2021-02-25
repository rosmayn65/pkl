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

                    <form action="{{route('kelurahan.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">Id Kelurahan</label>
                        <input type="text" name="id_kel" value="{{$kelurahan->id_kel}}" class="form-control" readonly>  
                    </div>
                    <div class="form-group">
                        <label for="">Nama Kelurahan</label>
                        <input type="text" name="nama_kel" value="{{$kelurahan->nama_kel}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Nama Kecamatan</label>
                        <input type="text" name="nama_kec" value="{{$kelurahan->kecamatan->nama_kec}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <a href="{{url()->previous()}}" class="btn btn-outline-primary btn-lg btn-block">Kembali</a>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection