<?php

namespace Database\Seeders;

use App\Models\Colors;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('colors')->insert([
            [
                'color_name' => 'Black',
                'hex_code' => '#000000',
            ],
            [
                'color_name' => 'White',
                'hex_code' => '#ffffff',
            ],
            [
                'color_name' => 'Sliver',
                'hex_code' => '#d9d2d2',
            ],
            [
                'color_name' => 'Titan',
                'hex_code' => '#756e6e',
            ],
            [
                'color_name' => 'Blue pastel',
                'hex_code' => '#b3e7f2',
            ],
            [
                'color_name' => 'Blue titan',
                'hex_code' => '#20266e',
            ],
            [
                'color_name' => 'Purple',
                'hex_code' => '#3e0e52',
            ],
            [
                'color_name' => 'Blue',
                'hex_code' => '#3572bd',
            ],
            [
                'color_name' => 'Light yellow',
                'hex_code' => '#f1f2b8',
            ],
            [
                'color_name' => 'Baby pink',
                'hex_code' => '#fcc7e9',
            ],
            [
                'color_name' => 'Black titan',
                'hex_code' => '#383738',
            ],
            [
                'color_name' => 'Pink',
                'hex_code' => '#fc86cd',
            ],
            [
                'color_name' => 'Light blue',
                'hex_code' => '#daeff5',
            ],
            [
                'color_name' => 'gold',
                'hex_code' => '#faf575',
            ],
            [
                'color_name' => 'green',
                'hex_code' => '#2fd678',
            ],
            [
                'color_name' => 'lilac',
                'hex_code' => '#f7daf6',
            ],
            [
                'color_name' => 'violet',
                'hex_code' => '#c9abc8',
            ],

            [
                'color_name' => 'cream',
                'hex_code' => '#f7f1e1',
            ],
            [
                'color_name' => 'green mint',
                'hex_code' => '#b7ebd9',
            ],
        ]);
    }
}
