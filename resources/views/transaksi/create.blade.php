@extends('layouts.app')
@section('content')

<div class="container">
    <h2 class="mb-3">Tambah Transaksi</h2>

    <form action="{{ route('transaksi.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="barang_id" class="form-label">Pilih Barang</label>
            <select name="barang_id" id="barang_id" class="form-select" required>
                <option value="">-- Pilih Barang --</option>
                @foreach ($barangs as $barang)
<option value="{{ $barang->id }}">
    {{ $barang->nama_barang }} | Rp {{ number_format($barang->harga, 0, '', '.') }} | Stok: {{ $barang->stok }}
</option>

                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="diskon" class="form-label">Diskon (%)</label>
            <input type="number" name="diskon" id="diskon" class="form-control" step="0.01" min="0" max="100" required>
        </div>
        
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('transaksi.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>

@endsection
