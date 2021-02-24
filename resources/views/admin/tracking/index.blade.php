@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Data Tracking
                    <a href="{{route('tracking.create')}}"
                       class="btn btn-primary float-right">
                        Tambah Data
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Lokasi</th>
                                <th>RW</th>
                                <th>Positif</th>
                                <th>Sembuh</th>
                                <th>Meninggal</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                            @php $no=1; @endphp
                            @foreach($tracking as $data)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>
                                    Provinsi : {{$data->rw->kelurahan->kecamatan->kota->provinsi->nama_prov}}<br>
                                    Kota : {{$data->rw->kelurahan->kecamatan->kota->nama_kota}}<br>
                                    Kecamatan : {{$data->rw->kelurahan->kecamatan->nama_kec}}<br>
                                    Kelurahan : {{$data->rw->kelurahan->nama_kel}}
                                </td>
                                <td alighn="cemter">{{$data->rw->rw}}</td>
                                <td alighn="center">{{$data->jml_positif}}</td>
                                <td alighn="center">{{$data->jml_sembuh}}</td>
                                <td alighn="center">{{$data->jml_meninggal}}</td>
                                <td alighn="center">{{$data->tanggal}}</td>
                                <td alighn="center">
                                    <form action="{{route('tracking.destroy',$data->id)}}" method="post">
                                        @csrf @method('delete')
                                        <a href="{{route('tracking.edit',$data->id)}}" class="btn btn-success btn-sm">Edit</a>
                                        <a href="{{route('tracking.show',$data->id)}}" class="btn btn-warning btn-sm">Show</a>
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('apakah anda yakin ?')">Delete</button>
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