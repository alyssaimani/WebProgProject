<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $transactions = [
            [
                'uuid' => Str::uuid(),
                'created_at' => Carbon::now(),
                'cartId' => '1'
            ],
            [
                'uuid' => Str::uuid(),
                'created_at' => Carbon::now(),
                'cartId' => '2'
            ],
            [
                'uuid' => Str::uuid(),
                'created_at' => Carbon::now(),
                'cartId' => '3'
            ],
            [
                'uuid' => Str::uuid(),
                'created_at' => Carbon::now(),
                'cartId' => '4'
            ],
            [
                'uuid' => Str::uuid(),
                'created_at' => Carbon::now(),
                'cartId' => '5'
            ]
        ];
        
        foreach ($transactions as $transaction) {
            DB::table('transactions')->insert($transaction);
        }
    }
}
