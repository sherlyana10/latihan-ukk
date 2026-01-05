<?php

namespace App\Http\Controllers;

use App\Models\tb_barang;
use Illuminate\Http\Request;

class TbBarangController extends Controller
{
    public function index()
    {
        $barangs = tb_barang::latest()->paginate(10);
        return view('barang.index', compact('barangs'));
    }

    public function create()
    {
        return view('barang.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'kode_barang' => 'required|max:50',
        'nama_barang' => 'required|max:100',
        'harga' => 'required|numeric|min:1',
        'stok' => 'required|integer|min:0',
        'keterangan' => 'nullable',
        'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    // Data TANPA gambar
    $data = $request->only([
        'kode_barang',
        'nama_barang',
        'harga',
        'stok',
        'keterangan'
    ]);

    // 🔥 CARA PALING AMAN AMBIL FILE
    if ($request->file('gambar') && $request->file('gambar')->isValid()) {

        $file = $request->file('gambar');
        $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

        $file->move(public_path('uploads'), $fileName);

        // 👉 INI YANG SEBELUMNYA TIDAK KEISI
        $data['gambar'] = $fileName;
    }

    tb_barang::create($data);

    return redirect()->route('barang.index')
        ->with('success', 'Data barang berhasil ditambahkan!');
}


    public function show(tb_barang $barang)
    {
        return view('barang.show', compact('barang'));
    }

    public function edit(tb_barang $barang)
    {
        return view('barang.edit', compact('barang'));
    }

    public function update(Request $request, tb_barang $barang)
    {
        $request->validate([
            'kode_barang' => 'required|max:50',
            'nama_barang' => 'required|max:100',
            'harga' => 'required|numeric|min:1',
            'stok' => 'required|integer|min:0',
            'keterangan' => 'nullable',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // ❗ JANGAN pakai $request->all()
        $data = $request->except('gambar');

        // ==== UPDATE GAMBAR ====
        if ($request->hasFile('gambar')) {

            // Hapus gambar lama
            if ($barang->gambar && file_exists(public_path('uploads/' . $barang->gambar))) {
                unlink(public_path('uploads/' . $barang->gambar));
            }

            $fileName = time() . '.' . $request->gambar->getClientOriginalExtension();
            $request->gambar->move(public_path('uploads'), $fileName);
            $data['gambar'] = $fileName;
        }

        $barang->update($data);

        return redirect()->route('barang.index')
            ->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy(tb_barang $barang)
    {
        // Hapus file gambar
        if ($barang->gambar && file_exists(public_path('uploads/' . $barang->gambar))) {
            unlink(public_path('uploads/' . $barang->gambar));
        }

        $barang->delete();

        return redirect()->route('barang.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
