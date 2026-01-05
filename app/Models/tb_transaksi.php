<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_transaksi extends Model
{
    use HasFactory;

    protected $table = 'tb_transaksis';
    protected $primaryKey = 'id';

    protected $fillable = [
        'barang_id',
        'harga',
        'diskon',
        'total_harga',
    ];

    // RELASI YANG BENAR
    public function barang()
    {
        return $this->belongsTo(tb_barang::class, 'barang_id');
    }
}
