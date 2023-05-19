<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $carts = [
            [
                'userId' => '1',
                'productId' => '1',
                'quantity' => 2,
                'total' => 10000,
                'isComplete' => 1
            ],
            [
                'userId' => '1',
                'productId' => '2',
                'quantity' => 2,
                'total' => 10000,
                'isComplete' => 1
            ],
            [
                'userId' => '1',
                'productId' => '3',
                'quantity' => 2,
                'total' => 10000,
                'isComplete' => 1
            ],
            [
                'userId' => '2',
                'productId' => '1',
                'quantity' => 2,
                'total' => 10000,
                'isComplete' => 0
            ],
            [
                'userId' => '2',
                'productId' => '3',
                'quantity' => 2,
                'total' => 10000,
                'isComplete' => 1
            ]
        ];
        
        foreach ($carts as $cart) {
            DB::table('carts')->insert($cart);
        }
    }
}
