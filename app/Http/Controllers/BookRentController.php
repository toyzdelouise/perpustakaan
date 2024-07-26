<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Buku;
use App\Models\RentLogs;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookRentController extends Controller
{
    public function index(Request $request)
    {
        $users = User::where('role','!=', 'admin')->get();
        $books = Buku::all();
        $selectedBook = $request->book_id ? Buku::find($request->book_id) : null;
        return view('buku.bukudetailuser', ['users' => $users, 'books' => $books, 'selectedBook' => $selectedBook]);
    }


    public function store(Request $request)
    {
       //dd($request);
            $request['rent_date'] = Carbon::now()->toDateString();
            $request['return_date'] = Carbon::now()->addDays(7)->toDateString();
            $request['buku_id'] = $request->book_id;

        $book = Buku::findOrFail($request->book_id);
        //dd($book);

        if ($book->stock == 0) {
            Session::flash('message', 'Buku Tidak Tersedia');
            Session::flash('alert-class', 'alert-danger');
            return redirect()->route('admin.book-rent');
        }

        $count = RentLogs::where('user_id', $request->user_id)
                        ->whereNull('actual_return_date')
                        ->count();

        if ($count >= 5) {
            Session::flash('message', 'User Dalam Batas Peminjaman');
            Session::flash('alert-class', 'alert-danger');
            return redirect()->back()->with('success','Buku Berhasil Terpinjam');
        }

        try {
            DB::beginTransaction();
            RentLogs::create($request->all());

            $book->stock -= 1;
            $book->save();

            DB::commit();

            Session::flash('message', 'Buku Berhasil Dipinjam');
            Session::flash('alert-class', 'alert-success');
            return redirect()->back()->with('success','Buku Berhasil Terpinjam');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('admin.book-rent')->with('error', 'Terjadi kesalahan: ' . $th->getMessage());
        }
    }
}


// namespace App\Http\Controllers;

// use App\Models\User;
// use App\Models\Buku;
// use App\Models\RentLogs;
// use Carbon\Carbon;
// use Illuminate\Support\Facades\Session;
// use Illuminate\Support\Facades\DB;
// use Illuminate\Http\Request;

// class BookRentController extends Controller
// {
//     public function index()
//     {
//         $users = User::where('role','!=', 'admin')->get();
//         $books = Buku::all();
//         return view('admin.book-rent', ['users' => $users, 'books' => $books]);
//     }

//     public function store(Request $request)
//     {
//         $request['rent_date'] = Carbon::now()->toDateString();
//         $request['return_date'] = Carbon::now()->addDays(7)->toDateString();
//         $request['buku_id'] = $request->book_id;

//         $book = Buku::findOrFail($request->book_id);

//         if ($book->stock == 0) {
//             Session::flash('message', 'Buku Tidak Tersedia');
//             Session::flash('alert-class', 'alert-danger');
//             return redirect()->route('admin.book-rent');
//         }

//         $count = RentLogs::where('user_id', $request->user_id)
//                          ->whereNull('actual_return_date')
//                          ->count();

//         if ($count >= 5) {
//             Session::flash('message', 'User Dalam Batas Peminjaman');
//             Session::flash('alert-class', 'alert-danger');
//             return redirect()->route('admin.book-rent');
//         }

//         try {
//             DB::beginTransaction();

//             RentLogs::create($request->all());

//             $book->stock -= 1;
//             $book->save();

//             DB::commit();

//             Session::flash('message', 'Buku Berhasil Dipinjam');
//             Session::flash('alert-class', 'alert-success');
//             return redirect()->route('admin.book-rent');
//         } catch (\Throwable $th) {
//             DB::rollBack();
//             return redirect()->route('admin.book-rent')->with('error', 'Terjadi kesalahan: ' . $th->getMessage());
//         }
//     }

//     public function rentBook($book_id)
//     {
//         // Assume the logged-in user is the one renting the book
//         $user = Auth::user();

//         $book = Buku::findOrFail($book_id);

//         if ($book->stock == 0) {
//             Session::flash('message', 'Buku Tidak Tersedia');
//             Session::flash('alert-class', 'alert-danger');
//             return redirect()->route('admin.book-rent');
//         }

//         $count = RentLogs::where('user_id', $user->id)
//                          ->whereNull('actual_return_date')
//                          ->count();

//         if ($count >= 5) {
//             Session::flash('message', 'User Dalam Batas Peminjaman');
//             Session::flash('alert-class', 'alert-danger');
//             return redirect()->route('admin.book-rent');
//         }

//         try {
//             DB::beginTransaction();

//             RentLogs::create([
//                 'user_id' => $user->id,
//                 'buku_id' => $book->id,
//                 'rent_date' => Carbon::now()->toDateString(),
//                 'return_date' => Carbon::now()->addDays(7)->toDateString(),
//             ]);

//             $book->stock -= 1;
//             $book->save();

//             DB::commit();

//             Session::flash('message', 'Buku Berhasil Dipinjam');
//             Session::flash('alert-class', 'alert-success');
//             return redirect()->route('admin.book-rent');
//         } catch (\Throwable $th) {
//             DB::rollBack();
//             return redirect()->route('admin.book-rent')->with('error', 'Terjadi kesalahan: ' . $th->getMessage());
//         }
//     }
// }

