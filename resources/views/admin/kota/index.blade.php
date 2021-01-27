@extends('layouts.master')

@section('content')
<div class="container">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Data Kota
                <a href="{{route('kota.create')}}" class="float-right">Tambah Data</a>
            </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th>No</th>
                                <th>Nama Provinsi</th>
                                <th>Kode Kota</th>
                                <th>Nama Kota</th>
                                <th>Aksi</th>
                            </tr>
                            @php $no = 1; @endphp
                            @foreach($kota as $data)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$data->provinsi->id}}</td>
                                <td>{{$data->kode_kota}}</td>
                                <td>{{$data->nama_kota}}</td>
                                <td>
                                    <form action="{{route('kota.destroy',$data->id)}}" method="POST">
                                        @csrf
                                        <a href="{{route('kota.edit',$data->id)}}" class="btn btn-succes btn-sm"></a>
                                        <a href="{{route('kota.show',$data->id)}}" class="btn btn-warning btn-sm">Show</a>
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection