<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;

    // Nama tabel jika berbeda dengan konvensi plural
    protected $table = 'partners';

    // Kolom yang dapat diisi
    protected $fillable = ['name', 'image', 'url'];
}
