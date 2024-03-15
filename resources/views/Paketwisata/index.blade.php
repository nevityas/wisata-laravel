@extends('adminlte::page')
@section('title', 'List paket wisata')
@section('content_header')
    <h1 class="m-0 text-dark">List paket wisata</h1>
@stop
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{route('paketwisata.create')}}" class="btn btn-primary mb-2">
                        Tambah
                    </a>
                    <table class="table table-hover table-bordered
table-stripped" id="example2">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Paket</th>
                            <th>Deskripsi</th>
                            <th>Fasilitas</th>
                            <th>Itinenary</th>
                            <th>Diskon</th>
                            <th>Foto1</th>
                            <th>Foto2</th>
                            <th>Foto3</th>
                            <th>Foto4</th>
                            <th>Foto5</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($paketwisata as $key => $pw)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$pw->nama_paket}}</td>
                                <td>{{$pw->deskripsi}}</td>
                                <td>{{$pw->fasilitas}}</td>
                                <td>{{$pw->itinenary}}</td>
                                <td>{{$pw->diskon}}</td>
                                <td><img src="storage/{{$pw->foto1}}" alt="{{$pw->foto1}}" class="img-thumbnail" /></td>
                                <td><img src="storage/{{$pw->foto2}}" alt="{{$pw->foto2}}" class="img-thumbnail" /></td>
                                <td><img src="storage/{{$pw->foto3}}" alt="{{$pw->foto3}}" class="img-thumbnail" /></td>
                                <td><img src="storage/{{$pw->foto4}}" alt="{{$pw->foto4}}" class="img-thumbnail" /></td>
                                <td><img src="storage/{{$pw->foto5}}" alt="{{$pw->foto5}}" class="img-thumbnail" /></td>
                                <td>
                                    <a href="{{route('paketwisata.edit', $pw)}}" class="btn btn-primary btn-xs">
                                        Edit
                                    </a>
<a href="{{route('paketwisata.destroy',$pw)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
@push('js')
    <form action="" id="delete-form" method="post">
        @method('delete')
        @csrf
    </form>
    <script>
        $('#example2').DataTable({
            "responsive": true,
        });
        function notificationBeforeDelete(event, el) {
            event.preventDefault();
            if (confirm('Apakah anda yakin akan menghapus data ? ')) {
                $("#delete-form").attr('action', $(el).attr('href'));
                $("#delete-form").submit();
            }
        }
    </script>
@endpush