@extends('adminlte::page')
@section('title', 'Tambah Data reservasi')
@section('content_header')
<h1 class="m-0 text-dark">Tambah Data reservasi</h1>
@stop
@section('content')
<form action="{{route('reservasi.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="form-group">
                        <label for="nama_lengkap">ID Pelanggan</label>
                        <div class="input-group">
                            <input type="hidden" name="id_pelanggan" id="id_pelanggan" value="{{old('id_pelanggan')}}">
                            <input type="text" class="form-control
@error('nama_lengkap') is-invalid @enderror" placeholder="ID Pelanggan" id="nama_lengkap" name="nama_lengkap"
                                value="{{old('nama_lengkap')}}" arialabel="Bidang Studi" aria-describedby="cari"
                                readonly>
                            <button class="btn btn-warning" type="button" data-bs-toggle="modal" id="cari"
                                data-bs-target="#staticBackdrop"></i>
                                Cari Data ID Pelanggan</button>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name_paket">ID Daftar Paket</label>
                        <div class="input-group">
                            <input type="hidden" name="id_daftar_paket" id="id_daftar_paket"
                                value="{{old('id_daftar_paket')}}">
                            <input type="text" class="form-control
@error('name_paket') is-invalid @enderror" placeholder="Id Daftar Paket" id="name_paket" name="name_paket"
                                value="{{old('name_paket')}}" arialabel="Id Daftar Paket" aria-describedby="cari"
                                readonly>
                            <button class="btn btn-warning" type="button" data-bs-toggle="modal" id="cari"
                                data-bs-target="#staticBackdrop1"></i>
                                Cari Data ID Daftar Paket</button>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="tgl_reservasi_wisata">Tanggal Reservasi Wisata</label>
                        <input type="date" class="form-control
@error('tgl_reservasi_wisata') is-invalid @enderror" id="tgl_reservasi_wisata"
                            placeholder="Masukan Nama Tanggal Reservasi Wisata" name="tgl_reservasi_wisata"
                            value="{{old('tgl_reservasi_wisata')}}">
                        @error('tgl_reservasi_wisata') <span class="textdanger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="text" class="form-control
@error('harga') is-invalid @enderror" id="harga" placeholder="Masukan Harga" name="harga" value="{{old('harga')}}">
                        @error('harga') <span class="textdanger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="jumlah_peserta">Jumlah Peserta</label>
                        <input type="text" class="form-control
@error('jumlah_peserta') is-invalid @enderror" id="jumlah_peserta" placeholder="Masukan Jumlah Peserta"
                            name="jumlah_peserta" value="{{old('jumlah_peserta')}}">
                        @error('jumlah_peserta') <span class="textdanger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="diskon">Diskon</label>
                        <input type="decimal" class="form-control
@error('diskon') is-invalid @enderror" id="diskon" placeholder="Masukan Jumlah Diskon" name="diskon"
                            value="{{old('diskon')}}">
                        @error('diskon') <span class="textdanger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="nilai_diskon">Nilai Diskon</label>
                        <input type="float
                        " class="form-control
@error('nilai_diskon') is-invalid @enderror" id="nilai_diskon" placeholder="Masukan Nilai Diskon" name="nilai_diskon"
                            value="{{old('nilai_diskon')}}">
                        @error('nilai_diskon') <span class="textdanger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="total_bayar">Total Bayar</label>
                        <input type="text" class="form-control
@error('total_bayar') is-invalid @enderror" id="total_bayar" placeholder="Masukan Total Bayar" name="total_bayar"
                            value="{{old('total_bayar')}}">
                        @error('total_bayar') <span class="textdanger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="file_bukti_tf" class="form-label">File Bukti Transfer</label>
                        <img class="img-preview img-fluid mb-3 col-sm-5 d-block">
                        <input class="form-control @error('file_bukti_tf') is-invalid @enderror" type="file"
                            id="file_bukti_tf" name="file_bukti_tf" onchange="previewImage()">
                        @error('file_bukti_tf') <span class="textdanger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="status_reservasi_wisata">Status Reservasi Wisata</label>
                        <select class="form-control @error('status_reservasi_wisata') isinvalid @enderror"
                            id="status_reservasi_wisata" name="status_reservasi_wisata">
                            <option value="pesan" @if(old('status_reservasi_wisata')=='pesan' )selected @endif>pesan
                            </option>
                            <option value="dibayar" @if(old('status_reservasi_wisata')=='dibayar' )selected @endif>
                                dibayar</option>
                            <option value="selesai" @if(old('status_reservasi_wisata')=='selesai' )selected @endif>
                                selesai</option>
                        </select>
                        @error('status_reservasi_wisata') <span class="textdanger">{{$message}}</span> @enderror
                    </div>

                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('reservasi.index')}}" class="btn
btn-default">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bsbackdrop="static" data-bs-keyboard="false" tabindex="-1"
        arialabelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable p-5">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Pencarian Data ID Pelanggan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                            <tr style="background-color: #2176ff">
                                <th style="color: white">No.</th>
                                <th style="color: white">Id Pelanggan</th>
                                <th style="color: white">Nama Lengkap</th>
                                <th style="color: white">No Handphone</th>
                                <th style="color: white">Alamat</th>
                                <th style="color: white">Foto</th>
                                <th style="color: white">Id User</th>
                                <th style="color: white">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pelanggan as $key => $bs)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$bs->id}}</td>
                                <td>{{$bs->nama_lengkap}}</td>
                                <td>{{$bs->no_hp}}</td>
                                <td>{{$bs->alamat}}</td>
                                <td>
                                    <img src="storage/{{$bs->foto}}" alt="{{$bs->foto}} tidak tampil"
                                        class="img-thumbnail" style="width: 50px;">
                                </td>

                                <td>
                                    <button type="button" class="btn btn-primary btn-xs"
                                        onclick="pilih('{{$bs->id}}', '{{$bs->nama_lengkap}}')" data-bs-dismiss="modal">
                                        Pilih </button>
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

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop1" data-bsbackdrop="static" data-bs-keyboard="false" tabindex="-1"
        arialabelledby="staticBackdropLabel1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable p-5">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel1">Pencarian Data ID Daftar Paket</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <table class="table table-hover table-bordered table-stripped" id="example3">
                        <thead>
                            <tr style="background-color: #2176ff">
                                <th style="color: white">No.</th>
                                <th style="color: white">Id Daftar Paket</th>
                                <th style="color: white">Nama Paket</th>
                                <th style="color: white">Id Paket Wisata</th>
                                <th style="color: white">Jumlah Peserta</th>
                                <th style="color: white">Harga Paket</th>
                                <th style="color: white">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($daftarpaket as $key => $dp)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$dp->id}}</td>
                                <td>{{$dp->name_paket}}</td>
                                <td>{{$dp->jumlah_peserta}}</td>
                                <td>{{$dp->harga_paket}}</td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-xs"
                                        onclick="pilih1('{{$dp->id}}', '{{$dp->name_paket}}',)" data-bs-dismiss="modal">
                                        Pilih </button>
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

        //Fungsi pilih untuk memilih data pelanggan dan mengirimkan data pelanggan dari Modal ke form tambah
        function pilih(id, bstud1) {
            document.getElementById('id_pelanggan').value = id
            document.getElementById('nama_lengkap').value = bstud1
        }

        $('#example3').DataTable({
            "responsive": true,
        });

        //Fungsi pilih untuk memilih data paket wisata dan mengirimkan data paket wisata dari Modal ke form tambah
        function pilih1(id, bstud2) {
            document.getElementById('id_daftar_paket').value = id
            document.getElementById('name_paket').value = bstud2
        }

        // Fitur Untuk Preview Image
        function previewImage() {
            const file_bukti_tf = document.querySelector('#file_bukti_tf');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const ofReader = new FileReader();
            ofReader.readAsDataURL(file_bukti_tf.files[0]);

            ofReader.onload = function (oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }

    </script>
    @endpush
