<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class KendaraanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
     DB::table('post')->delete();
    $vehicle = [
    ['Merek Kendaraan' => 'Mclaren', 'Warna' => 'Merah', 'Pintu' => '2', 'Kecepatan' => '300', 'Asal' => 'inggris'],
    ['Merek Kendaraan' => 'Lambo', 'Warna' => 'Hijau', 'Pintu' => '2', 'Kecepatan' => '300', 'Asal' => 'italia'],
    ['Merek Kendaraan' => 'Ferari', 'Warna' => 'Kuning', 'Pintu' => '1', 'Kecepatan' => '300', 'Asal' => 'italia'],
    ['Merek Kendaraan' => 'Koeningsegg', 'Warna' => 'Putih', 'Pintu' => '4', 'Kecepatan' => '300', 'Asal' => 'swedia'],
    ['Merek Kendaraan' => 'Pagani', 'Warna' => 'Hitam', 'Pintu' => '2', 'Kecepatan' => '300', 'Asal' => 'italia']

    ];

        DB::table('post')->insert($vehicle);

    }
}
