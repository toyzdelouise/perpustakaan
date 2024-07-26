@extends('desain.sidebarAdmin')

@section('konten')
<div class="container mt-4">
    <div class="pb-3">
        <form class="d-flex" action="{{ url('buku') }}" method="get">
            <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}"
                placeholder="Masukkan kata kunci" aria-label="Search">
            <button class="btn btn-secondary" type="submit">Cari</button>
        </form>
    </div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th class="col-md-1">No</th>
                <th class="col-md-2">User</th>
                <th class="col-md-2">Buku</th>
                <th class="col-md-2">Tanggal Peminjaman</th>
                <th class="col-md-2">Tanggal Pengembalian</th>
                <th class="col-md-1">Denda</th>
                <th class="col-md-1">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->userss->name }}</td>
                <td>{{ $item->bukus->nama_buku }}</td>
                <td>{{ $item->tangal_peminjaman }}</td>
                <td>{{ $item->tanggal_pengembalian }}</td>
                <td>{{ $item->denda }}</td>
                <td>
                    <span class="badge bg-success">{{ $item->status }}</span>
                </td>
                {{-- <td>
                    <a href="{{url('pengembalian-buku/'.$item->id)}}" class="btn btn-primary">Kembalikan</a>
                </td> --}}
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
