<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categoriesWithFeatures = [
            'Bitcoin' => [
                [
                    'title'       => 'Bitcoin Feature 1',
                    'description' => 'Description for Bitcoin Feature 1',
                    'icon'        => 'icon-bitcoin-1',
                ],
                [
                    'title'       => 'Bitcoin Feature 2',
                    'description' => 'Description for Bitcoin Feature 2',
                    'icon'        => 'icon-bitcoin-2',
                ],
                [
                    'title'       => 'Bitcoin Feature 3',
                    'description' => 'Description for Bitcoin Feature 3',
                    'icon'        => 'icon-bitcoin-3',
                ],
            ],
            'Ethereum' => [
                [
                    'title'       => 'Ethereum Feature 1',
                    'description' => 'Description for Ethereum Feature 1',
                    'icon'        => 'icon-ethereum-1',
                ],
                [
                    'title'       => 'Ethereum Feature 2',
                    'description' => 'Description for Ethereum Feature 2',
                    'icon'        => 'icon-ethereum-2',
                ],
                [
                    'title'       => 'Ethereum Feature 3',
                    'description' => 'Description for Ethereum Feature 3',
                    'icon'        => 'icon-ethereum-3',
                ],
            ],
            'Ripple' => [
                [
                    'title'       => 'Ripple Feature 1',
                    'description' => 'Description for Ripple Feature 1',
                    'icon'        => 'icon-ripple-1',
                ],
                [
                    'title'       => 'Ripple Feature 2',
                    'description' => 'Description for Ripple Feature 2',
                    'icon'        => 'icon-ripple-2',
                ],
            ],
            'Litecoin' => [
                [
                    'title'       => 'Litecoin Feature 1',
                    'description' => 'Description for Litecoin Feature 1',
                    'icon'        => 'icon-litecoin-1',
                ],
                [
                    'title'       => 'Litecoin Feature 2',
                    'description' => 'Description for Litecoin Feature 2',
                    'icon'        => 'icon-litecoin-2',
                ],
            ],
            'Cardano' => [
                [
                    'title'       => 'Cardano Feature 1',
                    'description' => 'Description for Cardano Feature 1',
                    'icon'        => 'icon-cardano-1',
                ],
                [
                    'title'       => 'Cardano Feature 2',
                    'description' => 'Description for Cardano Feature 2',
                    'icon'        => 'icon-cardano-2',
                ],
                [
                    'title'       => 'Cardano Feature 3',
                    'description' => 'Description for Cardano Feature 3',
                    'icon'        => 'icon-cardano-3',
                ],
            ],
        ];


        foreach ($categoriesWithFeatures as $categoryName => $features) {
            $category = \App\Models\Category::create(['title' => $categoryName]);

            foreach ($features as $feature) {
                \App\Models\FeatureList::create(array_merge($feature, [
                    'category_id' => $category->id
                ]));
            }
        }
    }
}
