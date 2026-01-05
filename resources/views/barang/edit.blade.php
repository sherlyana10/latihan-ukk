@extends('layouts.app')
@section('content')
<div class="container mt-4">
    <h3>Edit Barang</h3>
    <form action="{{ route('barang.update', $barang->id) }}" method="POST">
        @csrf
        @method('PUT')
  <div class="mb-3">
    <label >Kode Barang</label>
    <input type="text" name="kode_barang" value="{{ $barang->kode_barang }}" class="form-control">
  </div>
  <div class="mb-3">
    <label >Nama Barang</label>
    <input type="text" name="nama_barang" value="{{ $barang->nama_barang }}" class="form-control">
  </div>
    <div class="mb-3">
      <label>Gambar</label>
    <input type="file" name="gambar" class="form-control">
  </div>
  <div class="mb-3">
    <label >Harga</label>
 <input type="number" name="harga" value="{{ $barang->harga }}" class="form-control">

  </div>
  <div class="mb-3">
    <label >stok</label>
<input type="number" name="stok" value="{{ $barang->stok }}" class="form-control">
  </div>
  <div class="mb-3">
    <label >keterangan</label>
<textarea name="keterangan" class="form-control">{{ $barang->keterangan }}</textarea>
  </div>

    
  <button class="btn btn-success">update</button>
  <a href="{{ route('barang.index') }}" class="btn btn-secondary">Kembali</a>
</form>
</div>
@endsection