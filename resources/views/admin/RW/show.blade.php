@extends('layouts.master')
@section('content')
<div class = "container">
    <div class = "row">
        <div class = "col-md-12">
            <div class = "card">
               <div class = "card-header">
                    Lihat Data Rw
               </div>
               <div class="card-body">

                    <div class='form-group'>
                         <label for="">Id Rw</label>
                         <input type="text" name="id_rw" class="form-control" value="{{$rw->id_rw}}" id="" readonly>
                    </div>
                    <div class='form-group'>
                         <label for="">Rw</label>
                         <input type="text" name="rw" class="form-control" value="{{$rw->rw}}" readonly>
                    </div>
                    <div class='form-group'>
                        <label for="">Nama kelurahan</label>
                        <input type="text" name="nama_kel" class="form-control" value="{{$rw->kelurahan->nama_kel}}" readonly>
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