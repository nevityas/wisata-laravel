<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-toke" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Cetak Detail Pembelian</title>

</head>

<body>
    <div class="container text-center form-group">
        <p class="text-center"><b>CETAK DATA DETAIL PEMBELIAN</b></p>
        <table class="table border table-bordered
    table-stripped" id="example2">
            <thead>
                <tr class="border border-black">
                                <th>Id Pelanggan</th>
                                <th>Id Daftar Paket</th>
                                <th>Tanggal Reservasi Wisata</th>
                                <th>Harga</th>
                                <th>jumlah_peserta</th>
                                <th>Diskon</th>
                                <th>Nilai Diskon</th>
                                <th>Total Bayar</th>
                                <th>Bukti Transfer</th>
                                <th>User</th>
                                <th>Opsi</th>
                </tr>
            </thead>
            <tbody class="border border-black">

            @foreach($dp as $key => $pl)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$pl->id}}</td>
                                <td id={{$key+1}}>{{$pl->id_pelanggan}}</td>
                                <td id={{$key+1}}>{{$pl->id_daftar_paket}}</td>
                                <td id={{$key+1}}>{{$pl->tgl_reservasi_wisata}}</td>
                                <td id={{$key+1}}>{{$pl->jumlah_peserta}}</td>
                                <td id={{$key+1}}>{{$pl->diskon}}</td>
                                <td id={{$key+1}}>{{$pl->nilai_diskon}}</td>
                                <td id={{$key+1}}>{{$pl->total_bayar}}</td>
                                <td id={{$key+1}}>{{$pl->file_bukti_tf}}</td>
                                <td>
                                    <img src="storage/{{$pl->foto}}" alt="{{$pl->foto}} tidak tampil"
                                        class="img-thumbnail">
                                </td>
                                <td id={{$key+1}}>{{$pl->fuser->email}}</td>
                            
                            </tr>
                            @endforeach
            </tbody>
        </table>

    </div>
    <script type="text/javascript">
        window.print();

    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>