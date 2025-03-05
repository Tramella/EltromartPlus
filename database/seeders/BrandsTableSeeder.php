<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('brands')->insert([
            [
                'brand_name' => 'Apple',
                'brand_img' => 'AppleLogo.jpg'
            ],
            [
                'brand_name' => 'Samsung',
                'brand_img' => 'logoSamsung.jpg'
            ],
            [
                'brand_name' => 'Oppo',
                'brand_img' => 'OppoLogo.jpg'
            ],
            [
                'brand_name' => 'ASUS',
                'brand_img' => 'LogoAsus.jpg'
            ],
            [
                'brand_name' => 'MSI',
                'brand_img' => 'msiLogo.jpg'
            ],
            [
                'brand_name' => 'Levono',
                'brand_img' => 'LevonoLogo.jpg'
            ],
            [
                'brand_name' => 'Vivo',
                'brand_img' => 'VivoLogo.jpg'
            ],
            [
                'brand_name' => 'Xiaomi',
                'brand_img' => 'XiaomiLogo.jpg'
            ],
            [
                'brand_name' => 'DELL',
                'brand_img' => 'DellLogo.jpg'
            ],
            [
                'brand_name' => 'Huawei',
                'brand_img' => 'DellLogo.jpg'
            ],
            [
                'brand_name' => 'Acer',
                'brand_img' => 'DellLogo.jpg'
            ],
            [
                'brand_name' => 'LG',
                'brand_img' => 'DellLogo.jpg'
            ],
            [
                'brand_name' => 'Eltromart',
                'brand_img' => 'DellLogo.jpg'
            ],
            [
                'brand_name' => 'LG',
                'brand_img' => 'DellLogo.jpg'
            ],
            [
                'brand_name' => 'Logictech',
                'brand_img' => 'DellLogo.jpg'
            ],
            [
                'brand_name' => 'Akko',
                'brand_img' => 'DellLogo.jpg'
            ],
            [
                'brand_name' => 'Corsair ',
                'brand_img' => 'DellLogo.jpg'
            ],
            [
                'brand_name' => 'Rapo',
                'brand_img' => 'DellLogo.jpg'
            ],
            [
                'brand_name' => 'Ugreen',
                'brand_img' => 'DellLogo.jpg'
            ],
            [
                'brand_name' => 'Xmobile',
                'brand_img' => 'DellLogo.jpg'
            ],
            [
                'brand_name' => 'Ava',
                'brand_img' => 'DellLogo.jpg'
            ],
            [
                'brand_name' => 'Anker',
                'brand_img' => 'DellLogo.jpg'
            ],
            [
                'brand_name' => 'Basesus',
                'brand_img' => 'DellLogo.jpg'
            ],
            [
                'brand_name' => 'DJI',
                'brand_img' => 'DellLogo.jpg'
            ],
            [
                'brand_name' => 'HP HyperX',
                'brand_img' => 'DellLogo.jpg'
            ],
            [
                'brand_name' => 'Rezo',
                'brand_img' => 'DellLogo.jpg'
            ],
            [
                'brand_name' => 'Marshall',
                'brand_img' => 'DellLogo.jpg'
            ],
            [
                'brand_name' => 'Sounarc',
                'brand_img' => 'DellLogo.jpg'
            ],
            [
                'brand_name' => 'Monster',
                'brand_img' => 'DellLogo.jpg'
            ],
            [
                'brand_name' => 'Sony',
                'brand_img' => 'DellLogo.jpg'
            ],
            [
                'brand_name' => 'Soundcore',
                'brand_img' => 'DellLogo.jpg'
            ],

        ]);
    }
}
