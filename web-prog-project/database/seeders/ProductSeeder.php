<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                'name' => 'Autobiography of Peter Mendelsund',
                'price' => 430000,
                'description' => 'Author : Peter Mendelsund',
                'type' => 'Book',
                'image' => 'images/products/product1.jpg'
            ],
            [
                'name' => 'Pocket Notebook',
                'price' => 200000,
                'description' => 'Hardcover, Bullet Journal Fountain Pen Friendly',
                'type' => 'Book',
                'image' => 'images/products/product2.jpg'
            ],
            [
                'name' => 'Memo Sticky Notes',
                'price' => 25000,
                'description' => 'Floral pattern',
                'type' => 'Stationary',
                'image' => 'images/products/product3.jpg'
            ],
            [
                'name' => 'Toast and Egg Sticker',
                'price' => 40000,
                'description' => 'Waterproof stickers',
                'type' => 'Stationary',
                'image' => 'images/products/product4.jpg'
            ],
            [
                'name' => 'Colourful Drawing Pen',
                'price' => 40000,
                'description' => '6 variant colours',
                'type' => 'Stationary',
                'image' => 'images/products/product5.jpg'
            ]
        ];
        
        foreach ($products as $product) {
            DB::table('products')->insert($product);
        }
    }
}
