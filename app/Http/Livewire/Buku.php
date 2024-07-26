<?php
namespace App\Http\Livewire;

use App\Models\Buku as ModelsBuku;
use Livewire\Component;
use Livewire\WithPagination;

class Buku extends Component
{
    use WithPagination;

    public $id;

    public function keranjang($id)
    {
        $this->id = 8;
        // $buku = ModelsBuku::find($id);
        // dd($buku); // Debugging
    }

    public function perpustakaan($id)
    {
        $buku = ModelsBuku::find($id);
        dd($buku); // Debugging
    }

    public function mount($id){
        $this->id = $id;
    }

    public function render()
    {
        $data = ModelsBuku::find($this->id);
        return view('livewire.buku', compact('data'));
    }
}
