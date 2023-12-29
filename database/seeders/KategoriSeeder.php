<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $kategori = [
            ['name' => 'Baju Jersey'],
            ['name' => 'Hodie'],
            ['name' => 'Jaket'],
            ['name' => 'Baju Olahraga(Bulu Tangkis)'],
            ['name' => 'Baju Olahraga(Futsal)'],
            ['name' => 'Baju Olahraga(Tenis)'],
            ['name' => 'Baju Olahraga(Voly)'],
            ['name' => 'Baju Balap Sepeda'],
            ['name' => 'Jersey Set Motocross'],
            ['name' => 'Payung'],
        ];

        Kategori::insert($kategori);
    }
}
