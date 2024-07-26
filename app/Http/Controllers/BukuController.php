<?php

namespace App\Http\Controllers;
use App\Models\buku;
use App\Models\kategori;
use App\Models\penerbit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;


class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $data = buku::with('kategori')->get();
        $kategori = kategori::all();
        $penerbit = penerbit::all();
        $katakunci = $request->katakunci;
        if(strlen($katakunci)){
            $data = buku::with('kategoris')->where('id','like',"%$katakunci%")->orwhere('nama_buku','like',"%$katakunci%")->orwhere('kategori','like',"%$katakunci%")->paginate();
            $data = buku::with('penerbits')->where('id','like',"%$katakunci%")->orwhere('nama_buku','like',"%$katakunci%")->orwhere('penerbit','like',"%$katakunci%")->paginate();
        }else{
            $data = buku::with('kategoris')->orderBy('id','desc',)->paginate();
            $data = buku::with('penerbits')->orderBy('id','desc',)->paginate();
        }
        return view('user.dashboard',compact('data','kategori','penerbit'))->with('data',$data);
    }

    /**
     * Display the specified resource.
     */
    public static function show(string $id)
    {
        $data = buku::find($id);
        // dd($data);
         return view('buku.bukudetailuser', compact('data'));
    }

}
