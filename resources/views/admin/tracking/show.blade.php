@extends('layouts.master')

@section('content')
<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-8">
         <div class="card-header">Tracking</div>
         <div class="card-body">
             @csrf

             <div class="mb-3">
                   <label for="exampleInputPassword1" class="form-label">Rw</label>
                   <input type="text" value="{{$tracking->rw->rw}}" class="form-control" name="id_rw" readonly>      
             </div>
             <div class="mb-3">
             <div class="form-group">
                  <label for="exampleInputPassword1" class="form-label">Jumlah Positif</label>
                  <input type="number" value="{{$tracking->jml_positif}}" class="form-control" name="jml_positif" readonly>
             </div>
             <div class="form-group">
             <label for="exampleInputPassword1" class="form-label">Jumlah Sembuh</label>
             <input type="number" value="{{$tracking->jml_sembuh}}" class="form-control" name="jml_sembuh" readonly>
         </div>
         <div class="form-group">
             <label for="exampleInputPassword1" class="form-label">Jumlah Meninggal</label>
             <input type="number" value="{{$tracking->jml_meninggal}}" class="form-control" name="jml_meninggal" readonly>
         </div>
         <div class="form-group">
             <label for="exampleInputPassword1" class="form-label">Tanggal</label>
             <input type="date" value="{{$tracking->tanggal}}" class="form-control" name="tanggal" readonly>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsectiondiv