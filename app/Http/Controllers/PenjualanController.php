<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\DetailPenjualan;
use App\Models\Kategori;
use App\Models\Penjualan;
use App\Models\User;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataPenjualan = Penjualan::with('user')->get();
        return view ('penjualan.index', compact('dataPenjualan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kode_transaksi = Penjualan::orderBy('id', 'desc')->first();
        $urutan = $kode_transaksi->id;
        $huruf = "TR-";
        $urutan++;
        $kode_transaksi = $huruf . date('dmY') . sprintf("%03s", $urutan);

        $barang = Barang::get();
        $users = User::orderBy('id', 'desc')->get();
        return view('penjualan.create', compact('users', 'kode_transaksi', 'barang'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $penjualan = Penjualan::create([
            'id_user' => $request->id_user,
            'kode_transaksi' => $request->kode_transaksi,
            'tanggal_transaksi' => $request->tanggal_transaksi
        ]);
        foreach ($request->id_barang as $index => $id_barang) {
            DetailPenjualan::create([
                'id_penjualan' => $penjualan->id,
                'id_barang' => $id_barang,
                'jumlah' => $request->jumlah[$index],
                'qty' => $request->qty[$index],
                'harga' => $request->harga[$index],
                'total_harga' => $request->total_harga[$index],
                'nominal_bayar' => $request->nominal_bayar[$index],
                'kembalian' => $request->kembalian[$index],
            ]);
        };
        // Alert::success('Success', 'Data Added Successfully');
        return redirect()->to('penjualan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
