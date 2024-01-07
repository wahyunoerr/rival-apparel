<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'name',
        'ukuran_id',
        'kategori_id',
        'harga'
    ];

    function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    function ukuran()
    {
        return $this->belongsTo(Ukuran::class);
    }
}
