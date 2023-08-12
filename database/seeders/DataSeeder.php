<?php

namespace Database\Seeders;

use App\Models\Banner;
use App\Models\Category;
use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
 
class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category = [
            [
                'id' => 1,
                'name' => 'Pesta Merdeka',
                'slug' => 'pesta-merdeka',
            ],
            [
                'id' => 2,
                'name' => 'Doble Mantul',
                'slug' => 'double-mantul',
            ],
            [
                'id' => 3,
                'name' => 'Special Menu',
                'slug' => 'special-menu'
            ],
        ];

        foreach ($category as $item) {
            $data = Category::firstOrCreate($item);
        }

        $banner = [
            [
                'id' => 1,
                'name' => 'banner1',
                'link' => env('APP_URL').'/pesta-merdeka/1'
            ],
            [
                'id' => 2,
                'name' => 'banner2',
                'link' => env('APP_URL').'/double-mantul/2'
            ],
        ];

        foreach ($banner as $item) {
            $data = Banner::firstOrCreate($item);
            $data->addMedia('public/seed/'.$item['name'].'.jpeg') ->preservingOriginal()->toMediaCollection('banner_image');
        }

        $menu = [
            [
                'id' => 1,
                'name' => 'Merdeka Bundle',
                'price' => 45000,
                'category_id' => 1,
                'discount' => 5000
            ],
            [
                'id' => 2,
                'name' => 'Ayam Madura + Nasi',
                'price' => 30000,
                'category_id' => 1,
                'discount' => 2000
            ],
            [
                'id' => 3,
                'name' => '2 For 39 Cheese Burger',
                'price' => 55000,
                'category_id' => 2,
                'discount' => 7000
            ],
            [
                'id' => 4,
                'name' => 'Paket 1 Pcs Ayam Madura Medium',
                'price' => 95000,
                'category_id' => 3,
                'discount' => 13001
            ],
            [
                'id' => 5,
                'name' => 'Paket 5 Pcs Ayam Madura',
                'price' => 130000,
                'category_id' => 3,
                'discount' => 12001
            ],
        ];

        foreach ($menu as $item) {
            $data = Menu::firstOrCreate($item);
            if($item['id'] == 1){
                $data->addMedia('public/seed/merdeka2.jpeg') ->preservingOriginal()->toMediaCollection('menu_image');
            }elseif($item['id'] == 2){
                $data->addMedia('public/seed/merdeka1.jpeg') ->preservingOriginal()->toMediaCollection('menu_image');
            }elseif($item['id'] == 3){
                $data->addMedia('public/seed/double1.jpeg') ->preservingOriginal()->toMediaCollection('menu_image');
            }elseif($item['id'] == 4){
                $data->addMedia('public/seed/special2.jpeg') ->preservingOriginal()->toMediaCollection('menu_image');
            }else{
                $data->addMedia('public/seed/special1.jpeg') ->preservingOriginal()->toMediaCollection('menu_image');
            }
        }
    }
}
