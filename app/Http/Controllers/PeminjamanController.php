<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Peminjaman;

class PeminjamanController extends Controller
{
    public function index()
    {
        $title = 'Halaman Peminjaman Buku';
        $data = Peminjaman::whereIn('status', ['disetujui', 'batalkan'])->orWhereNull('status')->get();
        return view('buku.index', compact('title', 'data'));
    }

    public function store($id)
    {
        if (!Auth::check()) {
            return redirect()->route('account.login')->with('error', 'Anda harus login untuk meminjam buku');
        }
        $cek = DB::table('buku')->where('id', $id)->where('stock', '>', 0)->count();
        if ($cek > 0) {
            DB::table('table_peminjaman')->insert([
                'buku' => $id,
                'user' => Auth::user()->id,
                'denda' => 0,
                'tangal_peminjaman' => Carbon::now()->toDateString(),
                'tanggal_pengembalian' => Carbon::now()->addDays(7)->toDateString(),
            ]);

            $buku = DB::table('buku')->where('id', $id)->first();
            $stock_baru = $buku->stock - 1;

            DB::table('buku')->where('id', $id)->update(['stock' => $stock_baru]);
            return redirect()->back()->with('success', 'Anda berhasil meminjam');
        } else {
            return redirect()->back()->with('gagal', 'Buku Tidak Tersedia');
        }
    }

    public function accept($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->status = 'disetujui';
        $peminjaman->save();

        return redirect()->route('pinjam-buku')->with('success', 'Peminjaman disetujui');
    }
    public function remove($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->status = 'batalkan';
        $peminjaman->save();

        return redirect()->route('pinjam-buku')->with('error', 'Peminjaman Dibatalkan');
    }
}
