<?php

use Illuminate\Database\Seeder;

class MallsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('malls')->insert([
        	[
	            'name' => 'Mediamart',
	            'slug' => 'mediamart',
	            'email' => 'mediamart@gmail.com',
	            'password' => bcrypt('12345678'),
	            'phone' => '0987654321',
	            'image' => 'http://res.cloudinary.com/dg6jnduzv/image/upload/v1507012863/myshop/malls/logo_media_mart.jpg',
	        ],
	        [
	            'name' => 'Trần Anh',
	            'slug' => 'trananh',
	            'email' => 'trananh@gmail.com',
	            'password' => bcrypt('12345678'),
	            'phone' => '0123456789',
	            'image' => 'http://res.cloudinary.com/dg6jnduzv/image/upload/v1507012863/myshop/malls/logotrananh-03.jpg',
	        ],
    	]);
    }
}
