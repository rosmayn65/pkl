@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Data Tracking
                </div>
                <div class="card-body">
                    <form action="{{route('tracking.store')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                @livewire('dropdowns')
                            <div class="form-group">
                                <button type="submit" class="btn btn-outline-primary btn-lg btn-block" onclick="return confirm('Apakah anda yakin?')">Simpan</button>
                            </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="positif">Jumlah Positif</label>
                                        <input type="text" value="" class="form-control" name="jml_positif" required>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="sembuh">Jumlah Sembuh</label>
                                            <input type="text" class="form-control" value=""  name="jml_sembuh" required>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="meninggal">Jumlah Meninggal</label>
                                            <input type="text" class="form-control" value="" name="jml_meninggal" required>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="tanggal">Tanggal</label>
                                            <input type="date" class="form-control" value=""
                                             name="tanggal" required>
                                        </div>
                                   
                                </div>
                            </div>
                       </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection