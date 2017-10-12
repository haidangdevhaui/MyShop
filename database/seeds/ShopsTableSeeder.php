<?php

use Illuminate\Database\Seeder;

class ShopsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shops')->insert([
        	[
	            'name' => 'Shop One',
	            'slug' => 'shop-one',
	            'email' => 'shopone@gmail.com',
	            'password' => bcrypt('12345678'),
	            'phone' => '0987654321',
	            'image' => 'http://res.cloudinary.com/dg6jnduzv/image/upload/v1507715217/myshop/shops/shop.png',
	        ]
    	]);
    }
}
