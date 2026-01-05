@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3>Tambah Barang</h3>

    {{-- TAMPILKAN ERROR VALIDASI --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- FORM --}}
    <form action="{{ route('barang.store') }}" 
          method="POST" 
          enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Kode Barang</label>
            <input type="text" 
                   name="kode_barang" 
                   class="form-control" 
                   value="{{ old('kode_barang') }}" 
                   required>
        </div>

        <div class="mb-3">
            <label>Nama Barang</label>
            <input type="text" 
                   name="nama_barang" 
                   class="form-control" 
                   value="{{ old('nama_barang') }}" 
                   required>
        </div>

        <div class="mb-3">
            <label>Gambar</label>
            <input type="file" 
                   name="gambar" 
                   class="form-control">
        </div>

        <div class="mb-3">
            <label>Harga</label>
            <input type="number" 
                   name="harga" 
                   class="form-control" 
                   value="{{ old('harga') }}" 
                   step="0.01" 
                   required>
        </div>

        <div class="mb-3">
            <label>Stok</label>
            <input type="number" 
                   name="stok" 
                   class="form-control" 
                   value="{{ old('stok') }}" 
                   required>
        </div>

        <div class="mb-3">
            <label>Keterangan</label>
            <textarea name="keterangan" 
                      class="form-control">{{ old('keterangan') }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('barang.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
