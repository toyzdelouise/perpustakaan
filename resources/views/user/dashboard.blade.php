 @extends('desain.sidebar')
 <!-- START DATA -->
 @section('konten')
     @if (Session::has('success'))
         <div class="pt-3">
             <div class="alert alert-success">
                 {{ Session::get('success') }}
             </div>
         </div>
     @endif

     <div class="my-3 p-3 bg-body rounded shadow-sm">
         <!-- FORM PENCARIAN -->
         <div class="pb-3">
             <form class="d-flex" action="{{ url('buku') }}" method="get">
                 <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}"
                     placeholder="Masukkan kata kunci" aria-label="Search">
                 <button class="btn btn-secondary" type="submit">Cari</button>
             </form>
         </div>

         <table class="table table-striped">
             <thead>
                 <tr>
                     <th class="col-md-1">No</th>
                     <th class="col-md-1.5">Foto</th>
                     <th class="col-md-1.2">ID</th>
                     <th class="col-md-1.5">Judul</th>
                     <th class="col-md-1.5">Kategori</th>
                     <th class="col-md-2">Tahun Terbit</th>
                     <th class="col-md-1">Stock</th>
                 </tr>
             </thead>
             <tbody>
                 <?php $i = $data->firstItem(); ?>
                 @foreach ($data as $item)
                 {{-- {{$item}} --}}
                     <tr>
                         <td>{{ $i }}</td>
                         <td>
                             @if ($item->foto)
                                 <img style="max-width:50px; max-heigt:50;" src="{{ url('foto') . '/' . $item->foto }}"
                                     alt="">
                             @endif
                         </td>
                         <td>{{ $item->id }}</td>
                         <td>{{ $item->nama_buku }}</td>
                         <td>
                             @if ($item->kategoris)
                                 {{ $item->kategoris->kategori }}
                             @else
                                 <p style="">Data Tidak Tersedia</p>
                             @endif
                         </td>
                         <td>{{ $item->tahun_terbit }}</td>
                         <td>{{ $item->stock }}</td>
                         <td>
                            <a href="{{ route('account.show', $item->id) }}" class="btn btn-secondary btn-sm">Detail</a>
                         </td>
                     </tr>
                     <?php $i++; ?>
                 @endforeach
             </tbody>
         </table>

     </div>
     <!-- AKHIR DATA -->
 @endsection