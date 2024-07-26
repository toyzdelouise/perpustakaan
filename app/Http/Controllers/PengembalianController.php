<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\buku;

class PengembalianController extends Controller
{
    public function index()
    {
        $data = Peminjaman::where('status','kembali')->get();

        return view('buku.pengembalian',compact('data'));
    }

    public function pengembalian($id)
    {
        $item = Peminjaman::find($id);
        $id_buku = $item->buku;

        $buku = buku::find($id_buku); // Menggunakan $id_buku
        $now = $buku->stock;
        $stock_new = $now + 1;

        Peminjaman::where('id', $id)->update(['status' => 'kembali']);

        buku::where('id', $id_buku)->update(['stock' => $stock_new]); // Menggunakan $id_buku

        return redirect()->route('pengembalian-buku');
    }
}
