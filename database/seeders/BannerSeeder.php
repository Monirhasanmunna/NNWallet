<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Banner;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $banners = [
            [
                'image' => 'banners/banner1.jpg',
                'link'  => 'https://example.com/page1',
            ],
            [
                'image' => 'banners/banner2.jpg',
                'link'  => 'https://example.com/page2',
            ],
            [
                'image' => 'banners/banner3.jpg',
                'link'  => null,
            ],
        ];

        foreach ($banners as $banner) {
            Banner::create($banner);
        }
    }
}
