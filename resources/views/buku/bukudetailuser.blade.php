@extends('desain.sidebar')

@section('konten')
@if (Session::has('success'))
    <div class="pt-3">
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    </div>
@endif
@if (Session::has('gagal'))
    <div class="pt-3">
        <div class="alert alert-danger">
            {{ Session::get('gagal') }}
        </div>
    </div>
@endif
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <a href="{{ route('account.dashboard') }}" class="btn btn-secondary">
        << Kembali
    </a>
    <div class="row mt-3">
        @foreach ($data as $item)
        @if ($data->foto)
            <div class="col mt-4 mb-3">
                <img style="max-height: 2000px; max-width: 200px" src="{{ url('foto') . '/' . $data->foto }}"
                    alt="" srcset="">
            </div>
        @endif
        <div class="col-md-8">
            <div class="mb-3 mt-4 row">
                <label for="id" class="col-sm-2 col-form-label">ID</label>
                <div class="col-sm-10">
                    {{ $data->id }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nama_buku" class="col-sm-2 col-form-label">Judul</label>
                <div class="col-sm-10">
                    {{ $data->nama_buku }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="kategori" class="col-sm-2 col-form-label">Kategori</label>
                <div class="col-sm-10">
                    {{ $data->kategoris->kategori }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="penerbit" class="col-sm-2 col-form-label">Penerbit</label>
                <div class="col-sm-10">
                    {{ $data->penerbits->penerbit }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="tahun_terbit" class="col-sm-2 col-form-label">Tahun Terbit</label>
                <div class="col-sm-10">
                    {{ $data->tahun_terbit }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="stock" class="col-sm-2 col-form-label">Stock</label>
                <div class="col-sm-10">
                    {{ $data->stock }}
                </div>
            </div>
        </div>
        <div class="mb-3 mt-2 row">
            <a href="{{ route('account.peminjaman', $data->id) }}" class="btn btn-success">Pinjam</a>
        </div>
        @endforeach
    </div>
</div>
@endsection

