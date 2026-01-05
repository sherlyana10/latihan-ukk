@extends('layouts.app')
@section('content')
<div class="container">
    <h2 class="mb-3">Daftar Transaksi</h2>
    <a href="{{ route('transaksi.create') }}" class="btn btn-Primary mb-3">Tambah Transaksi</a>
    @if (session('success'))
    <div class="aletrt alert-success">{{ session('success') }}</div>
    @endif
    <table class="table tbale-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Barang</th>
                <th>Harga</th>
                <th>Diskon (%)</th>
                <th>Total Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transaksis as $i => $t)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $t->barang->nama_barang }}</td>
                <td>Rp {{ number_format($t->harga, 0, '', '.') }}</td>
                <td>{{ $t->diskon }}%</td>
                <td>Rp{{ number_format($t->total_harga, 0, '', '.') }}</td>
                <td>
                    <form action="{{ route('transaksi.destroy', $t->id) }}" method="POST">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            
            @endforeach
        </tbody>
    </table>
</div>
@endsection