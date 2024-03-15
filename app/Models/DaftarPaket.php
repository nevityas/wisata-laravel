<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarPaket extends Model
{
    use HasFactory;
    protected $table = 'daftar_paket';
    protected $fillable = [
    'name_paket',
    'id_paket_wisata',
    'jumlah_pelanggan',
    'harga_paket',
    
    
    ];

    public function fpaketwisata(){
        return $this->belongsTo(PaketWisata::class, 'id_paket_wisata', 'id');
        }
}