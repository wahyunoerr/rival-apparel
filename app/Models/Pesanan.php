<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $table = 'pesanans';

    protected $fillable = [
        'name',
        'ukuran_id',
        'kategori_id',
        'product_id',
        'gambar_design',
        'status',
        'revisi',
    ];

    function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    function ukuran()
    {
        return $this->belongsTo(Ukuran::class);
    }

    function product()
    {
        return $this->hasMany(Product::class);
    }
}
