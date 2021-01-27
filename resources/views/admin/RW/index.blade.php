@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
                    @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif
            <div class="card">
                <div class="card-header">
                    Data Rw
                    <a href="{{route('rw.create')}}"
                        class="float-right">
                        <img src="https://img.icons8.com/ios/30/000000/create-order--v1.png"/>
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="datatable">
                            <thead>
                                <tr>
                                    <th>Nomor</th>
                                    <th>Id Kelurahan</th>
                                    <th>Rw</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php $no=1; @endphp
                                @foreach($rw as $data)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$data->kelurahan->id}}</td>
                                    <td>{{$data->nama}}</td>
                                    <td>
                                        <form action="{{route('rw.destroy',$data->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{route('rw.show',$data->id)}}" class="btn btn-primary">
                                        <img src="https://img.icons8.com/material-outlined/24/000000/visible--v2.png"/>
                                        </a> |
                                        <a href="{{route('rw.edit',$data->id)}}" class="btn btn-warning">
                                        <img src="https://img.icons8.com/android/24/000000/edit.png"/>
                                        </a> |
                                        <button type="submit" class="btn btn-danger" onclick="return confirm
                                        ('Apakah anda yakin?')">
                                        <img src="https://img.icons8.com/metro/26/000000/trash.png"/>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection