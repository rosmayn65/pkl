@extends('layouts.master')

@section('content')
<div class="container">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Lihat Data Provinsi
            </div>
            <div class="card-body">
            <div class="form-group">
                    <label for="">Kode Provinsi</label>
                    <input type="text" name="kode_prov" class="form-control" value="{{($provinsi->kode_prov)}}" id="" readonly>
                </div>
                <div class="form-group">
                    <label for="">Nama Provinsi</label>
                    <input type="text" name="nama_prov" class="form-control" value="{{($provinsi->nama_prov)}}" id="" readonly>
                </div>
                <div class="form-group">
                    <a href="{{url()->previous()}}" class="btn btn-outline-primary btn-lg btn-block">Kembali</a>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
