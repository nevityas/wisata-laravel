@extends('adminlte::page')
@section('title', 'Daftar Paket')
@section('content_header')
<h1 class="m-0 text-dark">Edit Daftar Paket</h1>
@stop
@section('content')
<form action="{{route('daftarpaket.update', $daftarpaket)}}" method="post" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                <div class="form-group">
                        <label for="name_paket">Nama Paket</label>
                        <input type="text" class="form-control
@error('name_paket') is-invalid @enderror" id="name_paket" placeholder="Nama Paket" name="name_paket"
                            value="{{old('name_paket')}}">
                        @error('name_paket') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="id_paket_wisata"> Id Paket Wisata</label>
                        <div class="input-group">
                            <input type="hidden" name="id_paket_wisata" id="id_paket_wisata" value="{{old('id_paket_wisata')}}">
                            <input type="text" class="form-control 
@error('paket') is-invalid @enderror" placeholder="Id Paket Wisata" id="paket" name="paket" value="{{old('paket')}}" aria-label="Id Paket Wisata" aria-describedby="cari" readonly>
                            <button class="btn btn-warning" type="button" data-bs-toggle="modal" id="cari" data-bs-target="#staticBackdrop">Cari Data Daftar Paket</button>
                                    
                        </div>
</div>
                    <div class="form-group">
                        <label for="jumlah_pelanggan">Jumlah Pelanggan</label>
                        <input type="number" class="form-control
@error('jumlah_pelanggan') is-invalid @enderror" id="jumlah_pelanggan" placeholder="Jumlah Pelanggan" name="jumlah_pelanggan"
                            value="{{$daftarpaket->jumlah_pelanggan??old('jumlah_pelanggan')}}">
                        @error('jumlah_pelanggan') <span class=" text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="harga_paket">Harga Paket</label>
                        <input type="number" class="form-control
@error('harga_paket') is-invalid @enderror" id="harga_paket" placeholder="Harga Paket" name="harga_paket"
                            value="{{$daftarpaket->harga_paket??old('harga_paket')}}">
                        @error('harga_paket') <span class=" text-danger">{{$message}}</span> @enderror
                    </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{route('daftarpaket.index')}}" class="btn btn-default">
                            Batal
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
     <!-- Modal -->
     <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable p-5">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Pencarian Paket Wisata</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-hover table-bordered tablestripped" id="example2">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Paket</th>
                                    <th>Id Paket Wisata</th>
                                    <th>Deskripsi</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($paketwisata as $key => $pw)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$pw->nama_paket}}</td>
                                <td>{{$pw->deskripsi}}</td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-xs" onclick="pilih('{{$pw->id}}', '{{$pw->nama_paket}}' , '{{$pw->deskripsi}}')" data-bs-dismiss="modal">
                                        Pilih
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
        <!-- End Modal -->
    @stop
    @push('js')
    <script>
    $('#example2').DataTable({
        "responsive": true,
    });
    //Fungsi pilih untuk memilih data Kategori wisata dan mengirimkan data kategori wisata dari Modal ke form tambah

    function pilih(id, user) {
        document.getElementById('id_paket_wisata').value = id
        document.getElementById('paket').value = user
    }
    </script>

    @endpush