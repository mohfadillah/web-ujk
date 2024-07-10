<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPenjualan extends Model
{
    use HasFactory;
    protected $fillable = ['id_penjualan', 'id_barang', 'jumlah', 'qty', 'harga', 'total_harga', 'nominal_bayar', 'kembalian'];
    public function user (){
        return $this->belongsTo(User::class, 'id_penjualan', 'id');
    }
    public function barang (){
        return $this->belongsTo(Barang::class, 'id_barang', 'id');
    }
}
