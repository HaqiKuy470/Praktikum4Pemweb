<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $fillable = [
        'judul',
        'slug',
        'kategori',
        'tanggal',
        'penulis',
        'gambar',
        'ringkasan',
        'isi',
        'tag',
        'dilihat',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];
}
