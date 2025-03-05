<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('categories')->insert([
            [
                'cate_name' => 'Mobile Phone',
                'slug' => 'mobile',
                'cate_img' => 'mobile.jpg',
                'group_cate' => '1'
            ],
            [
                'cate_name' => 'Laptop',
                'slug' => 'laptop',
                'cate_img' => 'laptop.jpg',
                'group_cate' => '2'
            ],
            [
                'cate_name' => 'PC',
                'slug' => 'pc',
                'cate_img' => 'pc.jpg',
                'group_cate' => '31'
            ],
            [
                'cate_name' => 'Monitor',
                'slug' => 'monitor',
                'cate_img' => 'monitor.jpg',
                'group_cate' => '32'
            ],
            [
                'cate_name' => 'Tablet',
                'slug' => 'tablet',
                'cate_img' => 'tablet.jpg',
                'group_cate' => '4'
            ],
            [
                'cate_name' => 'Mobile accessories',
                'slug' => 'mobileAcc',
                'cate_img' => 'ChargerCable.jpg',
                'group_cate' => '51'
            ],
            [
                'cate_name' => 'Laptop accessories',
                'slug' => 'laptopAcc',
                'cate_img' => 'SSD.jpg',
                'group_cate' => '52'
            ],
            [
                'cate_name' => 'Audio accessories',
                'slug' => 'audioAcc',
                'cate_img' => 'over-ear.jpg',
                'group_cate' => '53'
            ],
            [
                'cate_name' => 'Storage device',
                'slug' => 'storage',
                'cate_img' => 'BackupCharger.png',
                'group_cate' => '54'
            ],
        ]);
    }
}
