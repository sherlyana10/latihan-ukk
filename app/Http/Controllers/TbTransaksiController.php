<?php

namespace App\Http\Controllers;

use App\Models\tb_barang;
use App\Models\tb_transaksi;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;

class TbTransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $transaksis = tb_transaksi::latest()->paginate(10);
            return view('transaksi.index', compact('transaksis'));

    }

    /**
     * Show the form for creating a new resource.
     */
public function create()
{
    $barangs = tb_barang::all();
    return view('transaksi.create', compact('barangs'));
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(rules: [
            'barang_id' => 'required|exists:tb_barangs,id',
            'diskon'=> 'required|numeric|min:0|max:100',
        ]);
        $barang = tb_barang::find($request->barang_id);
        $harga = $barang->harga;
        $diskon = $request->diskon;
        $total_harga = $harga - ($harga*($diskon / 100));

        tb_transaksi::create([
            'barang_id' => $barang->id,
            'harga' => $harga,
            'diskon'=> $diskon,
            'total_harga'=> $total_harga,
        ]);
        return redirect()->route('transaksi.index')->with('success', 'Data Transaksi Berhasil di Tambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(tb_transaksi $tb_transaksi)
    {
        return view('transaksi.show',compact('tb_transaksi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(tb_transaksi $tb_transaksi)
    {
        return view('transaksi.edit', compact('tb_transaksi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, tb_transaksi $tb_transaksi)
    {
           $request->validate([
        'barang_id' => 'required|exists:tb_barangs,id',
        'diskon' => 'required|numeric|min:0|max:100',
    ]);

    $barang = tb_barang::find($request->barang_id);
     $harga = $barang->harga;
      $diskon = $request->diskon;
       $total_harga = $harga - ($harga * ($diskon / 100));

        $tb_transaksi->update([
        'barang_id' => $barang->id,
        'harga' => $harga,
        'diskon' => $diskon,
        'total_harga' => $total_harga,

            ]);
        return redirect()->route('transaksi.index')->with('success', 'Data Berhasil Di Perbarui!');
}
         public function destroy(tb_transaksi $tb_transaksi)
    {
        $tb_transaksi->delete();
        return redirect()->route('transaksi.index')->with('Success', 'Data transaksi berhasil di Hapus!');
    }

    
}

