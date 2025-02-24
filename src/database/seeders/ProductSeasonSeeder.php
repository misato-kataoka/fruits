<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_season')->insert([
            [
                'product_id' => '54',
                'season_id' => '3',
            ],
            [
                'product_id' => '54',
                'season_id' => '4',
            ],
            [
                'product_id' => '55',
                'season_id' => '1',
            ],
            [
                'product_id' => '56',
                'season_id' => '4',
            ],
            [
                'product_id' => '57',
                'season_id' => '2',
            ],
            [
                'product_id' => '58',
                'season_id' => '2',
            ],
            [
                'product_id' => '59',
                'season_id' => '2',
            ],
            [
                'product_id' => '59',
                'season_id' => '3',
            ],
            [
                'product_id' => '60',
                'season_id' => '1',
            ],
            [
                'product_id' => '60',
                'season_id' => '2',
            ],
            [
                'product_id' => '61',
                'season_id' => '2',
            ],
            [
                'product_id' => '61',
                'season_id' => '3',
            ],
            [
                'product_id' => '62',
                'season_id' => '2',
            ],
            [
                'product_id' => '63',
                'season_id' => '1',
            ],
            [
                'product_id' => '63',
                'season_id' => '2',
            ],
        ]);
    }
}
