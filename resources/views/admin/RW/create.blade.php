@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Data Rw
                </div>
                <div class="card-body">
                    <form action="{{route('rw.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Id Rw</label>
                            <input type="text" name="id_rw" class="form-control" required>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Rw</label>
                            <input type="text" name="rw" class="form-control" required>  
                        </div>
                        <div class="form-group">
                            <label for="">Id Kelurahan</label>
                            <select class="form-control" name="id_kel" id="">
                                @foreach($kelurahan as $data)
                                    <option value="{{$data->id}}">{{$data->id_kel}}</option>
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