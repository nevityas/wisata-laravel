<?php

namespace App\Http\Controllers;
use App\Models\DaftarPaket;
use App\Models\PaketWisata;
use App\Models\User;
use Illuminate\Http\Request;

class DaftarPaketController extends Controller
{
    public function index(){
        $daftarpaket = daftarpaket::all();
        return view('daftarpaket.index', [
        'daftarpaket' => $daftarpaket
        ]);
        }
    
        public function create(){
            return view(
                'daftarpaket.create', [
                'paketwisata' => PaketWisata::all()
        ]);
            }
            
        public function store(Request $request){
            // //Menyimpan Data Karyawan
            $request->validate([
            'name_paket'=> 'required',
            'id_paket_wisata' => 'required',
            'jumlah_pelanggan' => 'required',
            'harga_paket' => 'required',
            
            ]);
            $array = $request->only([
                'name_paket',
                'id_paket_wisata',
                'jumlah_pelanggan',
                'harga_paket',
               
            
            ]);
             daftarpaket::create($array);
            return redirect()->route('daftarpaket.index')
            ->with('success_message', 'Berhasil menambah kategori daftar wisata
            baru');
            
        }
        
            public function edit($id)
            {
            //Menampilkan Form Edit
            $daftarpaket = daftarpaket::find($id);
            if (!$daftarpaket) return redirect()->route('daftarpaket.index')
            ->with('error_message', 'daftar Paket dengan id = '.$id.'
            tidak ditemukan');
            return view('daftarpaket.edit', [
            'daftarpaket' => $daftarpaket,
            'paketwisata' => PaketWisata::all()


            //Mengirimkan semua data Users ke Modal pada halaman edit
            ]);
            }

            public function update(Request $request, $id)
            {
            // $request->validate([
            // 'name_paket' => 'required',
            // 'id_paket_wisata' => 'required',
            // 'jumlah_pelanggan' => 'required',
            // 'harga_paket' => 'required'
            // ]);
            $daftarpaket = daftarpaket::find($id);
            $daftarpaket->name_paket = $request->name_paket;
            $daftarpaket->id_paket_wisata = $request->id_paket_wisata;
            $daftarpaket->jumlah_pelanggan = $request->jumlah_pelanggan;
            $daftarpaket->harga_paket = $request->harga_paket;
            $daftarpaket->save();
            return redirect()->route('daftarpaket.index')
            ->with('success_message', 'Berhasil mengubah
            daftarpaket');
            } 

            public function destroy(Request $request, $id)
            {
                //Menghapus Data
                $daftarpaket = daftarpaket::find($id);
                if ($daftarpaket) $daftarpaket->delete();
                return redirect()->route('daftarpaket.index')->with('success_message', 'Berhasil menghapus daftar paket  !');
            }

    
}