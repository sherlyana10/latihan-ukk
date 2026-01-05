@extends('layouts.app')
@section('content')
<div class="container mt-4">
    <h3>Detail barang</h3>
    <table class="table table-bordered">
<tr><th>Kode Barang</th><td>{{ $barang->kode_barang }}</td></tr>
<tr><th>Nama Barang</th><td>{{ $barang->nama_barang }}</td></tr>
<tr><th>Harga</th><td>Rp {{ number_format($barang->harga, 2, ',', '.') }}</td></tr>
<tr><th>Stok</th><td>{{ $barang->stok }}</td></tr>
<tr><th>Keterangan</th><td>{{ $barang->keterangan }}</td></tr>
    </table>
    
</div>
@endsection