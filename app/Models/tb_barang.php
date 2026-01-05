<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tb_barang extends Model
{
    protected $table = 'tb_barangs';

    protected $fillable = [
        'kode_barang',
        'nama_barang',
        'gambar',
        'harga',
        'stok',
        'keterangan',
    ];

    public function transaksis()
        {
            return $this->hasMany(tb_transaksi::class, 'barang_id');
        }
    
}
