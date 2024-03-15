@extends('adminlte::page')
@section('title', 'List Daftar Paket')
@section('content_header')
<h1 class="m-0 text-dark">List Daftar Paket</h1>
@stop
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <a href="{{route('daftarpaket.create')}}" class="btn btn-primary mb-2">
                    Tambah
                </a>
                <table class="table table-hover table-bordered table-stripped" id="example2">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Paket</th>
                            <th>Id Paket Wisata</th>
                            <th>Jumlah Pelanggan</th>
                            <th>Harga Paket</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($daftarpaket as $key => $dp)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$dp->name_paket}}</td>
                            <td id={{$key+1}}>{{$dp->id_paket_wisata}}</td>
                            <td>{{$dp->jumlah_pelanggan}}</td>
                            <td>{{$dp->harga_paket}}</td>
                            <td>
                                <a href="{{route('daftarpaket.edit',$dp)}}" class="btn btn-primary btn-xs">
                                    Edit
                                </a>
                                <a href="{{route('daftarpaket.destroy',$dp)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
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

function notificationBeforeDelete(event, el, dt) {
    event.preventDefault();
    if (confirm('Apakah anda yakin akan menghapus Data Daftar Paket ? \"' + document.getElementById(dt)
            .innerHTML + '\" ?')) {
        $("#delete-form").attr('action', $(el).attr('href'));
        $("#delete-form").submit();
    }
}
</script>
@endpush