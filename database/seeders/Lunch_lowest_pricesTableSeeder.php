<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Lunch_lowest_price;

class Lunch_lowest_pricesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lunch_lowest_prices = [
          1000,2000,3000,4000,5000,6000,8000,10000,15000,20000,30000,40000,50000,60000,80000,100000
        ];

        foreach ($lunch_lowest_prices as $lunch_lowest_price) {
            Lunch_lowest_price::create([
                'price' => $lunch_lowest_price                        
            ]);
        }
    }
}
