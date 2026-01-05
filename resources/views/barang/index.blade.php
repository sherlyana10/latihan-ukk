@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3 class="mb-3">Daftar Barang</h3>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('barang.create') }}" class="btn btn-primary mb-3">+ Tambah Barang</a>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Gambar</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($barangs as $i => $b)
            <tr>
                <td>{{ $i + 1 }}</td>

                <td>{{ $b->kode_barang }}</td>

                <td>{{ $b->nama_barang }}</td>

                <!-- Gambar -->
                <td>
                    @if ($b->gambar)
                        <img src="{{ asset('uploads/' . $b->gambar) }}"
                             alt="Gambar {{ $b->nama_barang }}"
                             width="70" height="70"
                             style="object-fit: cover; border-radius: 6px;">
                    @else
                        <span class="text-muted">Tidak ada</span>
                    @endif
                </td>

                <!-- Harga -->
                <td>Rp {{ number_format($b->harga, 0, ',', '.') }}</td>

                <!-- Stok -->
                <td>{{ $b->stok }}</td>

                <!-- Aksi -->
                <td>
                    <a href="{{ route('barang.show', $b->id) }}" class="btn btn-info btn-sm">Lihat</a>
                    <a href="{{ route('barang.edit', $b->id) }}" class="btn btn-warning btn-sm">Edit</a>

                    <form action="{{ route('barang.destroy', $b->id) }}" 
                          method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $barangs->links() }}
</div>
@endsection
