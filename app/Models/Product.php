<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Jika nama tabel berbeda dari default (products), tentukan secara manual
    protected $table = 'products';

    // Tentukan kolom-kolom yang bisa diisi (mass assignable)
    protected $fillable = [
        'name',
        'price',
    ];

    // Jika tidak menggunakan kolom created_at dan updated_at, tambahkan properti ini
    public $timestamps = true;
}
