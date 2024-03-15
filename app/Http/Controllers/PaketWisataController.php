<?php

namespace App\Http\Controllers;
use App\Models\PaketWisata;
use Illuminate\Http\Request;

class PaketWisataController extends Controller
{
    public function index(){
        return view('paketwisata.index', ['paketwisata' => Paketwisata::all()]);
        }

        public function create()
        {
        //Menampilkan Form Tambah 
        return view('paketwisata.create');
        }

        public function store(Request $request){
            //Menyimpan Data 
            $request->validate([
                'nama_paket' => 'required',
                'deskripsi'  => 'required',
                'fasilitas'  => 'required',
                'itinenary'  => 'required',
                'diskon'     => 'required',
                'foto1'      => 'required|image|file|max:2048',
                'foto2'      => 'required|image|file|max:2048',
                'foto3'      => 'required|image|file|max:2048',
                'foto4'      => 'required|image|file|max:2048',
                'foto5'      => 'required|image|file|max:2048'
                ]);
            $array=$request->only([ 
                'nama_paket',
                'deskripsi',
                'fasilitas',
                'itinenary',
                'diskon',
                'foto1',
                'foto2',
                'foto3',
                'foto4',
                'foto5',
                ]);
    
                $array['foto1'] = $request->file('foto1')->store('Foto Wisata');
                $array['foto2'] = $request->file('foto2')->store('Foto Wisata');
                $array['foto3'] = $request->file('foto3')->store('Foto Wisata');
                $array['foto4'] = $request->file('foto4')->store('Foto Wisata');
                $array['foto5'] = $request->file('foto5')->store('Foto Wisata');
                $tambah=PaketWisata::create($array);
                if($tambah) $request->file('foto1')->store('Foto Wisata');
                if($tambah) $request->file('foto2')->store('Foto Wisata');
                if($tambah) $request->file('foto3')->store('Foto Wisata');
                if($tambah) $request->file('foto4')->store('Foto Wisata');
                if($tambah) $request->file('foto5')->store('Foto Wisata');
                    return redirect()->route('paketwisata.index')->with('success_message', 'Berhasil menambah Paket Wisata baru');
                }

                public function edit($id)
            {
            //Menampilkan Form Edit
            $pktwisata = PaketWisata::find($id);
            if (!$pktwisata) return redirect()->route('paketwisata.index')
            ->with('error_message', 'Paket Wisata dengan id = '.$id.'
            tidak ditemukan');
            return view('paketwisata.edit', [
            'pktwisata' => $pktwisata,
            ]);
            }

            public function update(Request $request, $id)
            {
            // $request->validate([
            // 'nama_paket' => 'required',
            // 'deskripsi' => 'required',
            // 'fasilitas' => 'required',
            // 'itinenary' => 'required',
            // 'diskon' => 'required',
            // 'foto1' => 'required',
            // 'foto2' => 'required',
            // 'foto3' => 'required',
            // 'foto4' => 'required',
            // 'foto5' => 'required'
            // ]);
            $pktwisata = PaketWisata::find($id);
            $pktwisata->nama_paket = $request->nama_paket;
            $pktwisata->deskripsi = $request->deskripsi;
            $pktwisata->fasilitas = $request->fasilitas;
            $pktwisata->itinenary = $request->itinenary;
            $pktwisata->diskon = $request->diskon;
            $pktwisata->foto1 = $request->file('foto1')->store('Foto Wisata');
            $pktwisata->foto2 = $request->file('foto2')->store('Foto Wisata');
            $pktwisata->foto3 = $request->file('foto3')->store('Foto Wisata');
            $pktwisata->foto4 = $request->file('foto4')->store('Foto Wisata');
            $pktwisata->foto5 = $request->file('foto5')->store('Foto Wisata');
            $pktwisata->save();
            return redirect()->route('paketwisata.index')
            ->with('success_message', 'Berhasil mengubah
            Paket Wisata');
            }
    
                public function destroy(Request $request, $id)
                {
                //Menghapus 
                $pktwisata = PaketWisata::find($id);
                if ($pktwisata) {
                    $hapus = $pktwisata->delete();
                    if ($hapus) unlink("storage/" . $pktwisata->foto1);
                    if ($hapus) unlink("storage/" . $pktwisata->foto2);
                    if ($hapus) unlink("storage/" . $pktwisata->foto3);
                    if ($hapus) unlink("storage/" . $pktwisata->foto4);
                    if ($hapus) unlink("storage/" . $pktwisata->foto5);
                }
                return redirect()->route('paketwisata.index')
                ->with('success_message', 'Berhasil menghapus Paket Wisata');
                } 
                     

}