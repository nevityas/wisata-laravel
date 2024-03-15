@extends('adminlte::page')
@section('title', 'List Reservasi')
@section('content_header')
<h1 class="m-0 text-dark">List Reservasi</h1>
@stop
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <a href="{{route('reservasi.create')}}" class="btn
                    btn-primary mb-2">
                        Tambah
                    </a>
                    <table class="table table-hover table-bordered
                        table-stripped" id="example2">
                        <thead>
                            <tr>
                                <th>Id Pelanggan</th>
                                <th>Id Daftar Paket</th>
                                <th>Tanggal Reservasi Wisata</th>
                                <th>jumlah_peserta</th>
                                <th>diskon</th>
                                <th>Nilai Diskon</th>
                                <th>Total Bayar</th>
                                <th>Bukti Transfer</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reservasi as $key => $pl)
                            <tr>
                                
                                <!-- <td>{{$pl->id}}</td> -->
                                <td id={{$key+1}}>{{$pl->id_pelanggan}}</td>
                                <td id={{$key+1}}>{{$pl->id_daftar_paket}}</td>
                                <td id={{$key+1}}>{{$pl->tgl_reservasi_wisata}}</td>
                                <td id={{$key+1}}>{{$pl->jumlah_peserta}}</td>
                                <td id={{$key+1}}>{{$pl->diskon}}</td>
                                <td id={{$key+1}}>{{$pl->nilai_diskon}}</td>
                                <td id={{$key+1}}>{{$pl->total_bayar}}</td>
                                <!-- <td id={{$key+1}}>{{$pl->file_bukti_tf}}</td> -->
                               

                                <td>
                                    <img src="storage/{{$pl->file_bukti_tf}}" alt="{{$pl->foto}} tidak tampil"
                                        class="img-thumbnail">
                                </td>
                                
                                <td>
                                    <a href="{{route('reservasi.edit', $pl)}}" class="btn btn-primary btn-xs">
                                        Edit
                                    </a>
                                    <a href="{{route('reservasi.destroy', $pl)}}"
                                        onclick="notificationBeforeDelete(event, this, <?php echo $key+1; ?>)"
                                        class="btn btn-danger btn-xs">
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
    if (confirm('Apakah anda yakin akan menghapus Data Reservasi ? \"' + document.getElementById(dt)
            .innerHTML + '\" ?')) {
        $("#delete-form").attr('action', $(el).attr('href'));
        $("#delete-form").submit();
    }
}
</script>
@endpush