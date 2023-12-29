<?php

namespace Database\Seeders;

use App\Models\Ukuran;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UkuranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ukuran::truncate();
        $ukuran = [
            [
                'nUkuran' => 'Ukuran Anak',
                'harga' => null
            ],
            [
                'nUkuran' => 'S',
                'harga' => null
            ],
            [
                'nUkuran' => 'M',
                'harga' => null
            ],
            [
                'nUkuran' => 'L',
                'harga' => null
            ],
            [
                'nUkuran' => 'XL',
                'harga' => null
            ],
            [
                'nUkuran' => 'XXL',
                'harga' => null
            ],
            [
                'nUkuran' => '3XL',
                'harga' => '30000'
            ],
            [
                'nUkuran' => '4XL',
                'harga' => '30000'
            ]
        ];

        Ukuran::insert($ukuran);
    }
}
