<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class buku extends Model
{
    use HasFactory;
    protected $fillable = ['nama_buku', 'kategori', 'tahun_terbit','penerbit','stock','foto'];
    protected $table = 'buku';
    public $timestamps = false;

    public function kategoris()
    {
        return $this->belongsTo(kategori::class, 'kategori', 'id');
    }

    public function penerbits()
    {
        return $this->belongsTo(penerbit::class, 'penerbit', 'id');
    }

    public function detailPeminjaman()
    {
        return $this->hasMany(DetailPeminjaman::class, 'buku_id');
    }
}
