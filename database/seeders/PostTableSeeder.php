<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('posts')->delete();
        $post = [
            ['title' => 'BelajarLaravel', 'content' =>'LoremIpsum'],
            ['title' => 'Tips Belajar Laravel', 'content' => 'LoremIpsum'],
            ['title' => 'Jadwal latihan Workout Bulanan', 'content' => 'LoremIpsum']
        ];

        DB::table('posts')->insert($post);

    }
}
