<?php

namespace App\Http\Controllers;
use App\Models\penerbit;
use Illuminate\Http\Request;

class PenerbitController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        if(strlen($katakunci)){
            $data = penerbit::where('id','like',"%$katakunci%")->orwhere('penerbit','like',"%$katakunci%")->paginate();
        }else{
            $data = penerbit::orderBy('id','desc',)->paginate();
        }
        return view('penerbit.user')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('penerbit.penerbit');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session()->flash('id', $request->id);
        Session()->flash('penerbit', $request->penerbit);
        $request->validate([
            'id'=>'required|string|unique:penerbit,id',
            'penerbit'=>'required',
        ],[
            'id.required'=>'id wajib diisi!',
            'id.unique'=>'id sudah terdaftar!',
            'penerbit.required'=>'penerbit wajib diisi!',
        ]);
        $data = [
            'id' => $request->id,
            'penerbit' => $request->penerbit,
        ];
        penerbit::create($data);
        return redirect()->to('penerbit')->with('success', 'Data Berhasil Ditambahkan!');
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
        $data = penerbit::where('id',$id)->first();
        return view('penerbit.penerbitedit')->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'penerbit'=>'required',
        ],[
            'penerbit.required'=>'penerbit wajib diisi!',
        ]);
        $data = [
            'penerbit'=>$request->penerbit,
        ];
        penerbit::where('id',$id)->update($data);
        return redirect()->to('penerbit')->with('success', 'Data Berhasil Terupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        penerbit::where('id',$id)->delete();
        return redirect()->to('penerbit')->with('success','Data Berhasil Dihapus!');
    }
}

