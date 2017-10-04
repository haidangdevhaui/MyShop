<?php

use Illuminate\Database\Seeder;

class ConfigsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('configs')->insert([
        	[
        		'_key' => 'mall_limit',
        		'_value' => 21
        	],
        	[
        		'_key' => 'flash_sale_limit',
        		'_value' => 10
        	],
        	[
        		'_key' => 'product_popular_limit',
        		'_value' => 10
        	],
        	[
        		'_key' => 'product_on_day_limit',
        		'_value' => 10
        	]
        ]);
    }
}
