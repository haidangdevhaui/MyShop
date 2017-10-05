<?php

use Illuminate\Database\Seeder;
use bheller\ImagesGenerator\ImagesGeneratorProvider;
use Faker\Factory;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $faker->addProvider(new ImagesGeneratorProvider($faker));
        $productCategories = DB::table('product_categories')->select('id')->get()->pluck('id')->toArray();
        $malls = DB::table('malls')->select('id')->get()->pluck('id')->toArray();
        $data = [];
        for ($i=0; $i < 100; $i++) { 
        	$name = $faker->name;
        	$data[] = [
        		'mall_id' => $malls[rand(0, count($malls) - 1)],
        		'product_category_id' => $productCategories[rand(0, count($productCategories) - 1)],
        		'name' => $name,
        		'slug' => str_slug($name),
        		'price' => $faker->randomNumber(6),
        		'total_numb' => rand(10, 50),
        		'image' => '[{"largest": "http://res.cloudinary.com/dg6jnduzv/image/upload/v1506566292/myshop/category/phone.jpg", "thumb": "http://res.cloudinary.com/dg6jnduzv/image/upload/c_scale,w_100/v1506566292/myshop/category/phone.jpg"}]',
        		'color' => '[{"color": "#ff0000", "price": "1000000"}, {"color": "#ffff00", "price": "500000"}]',
        		'detail' => '[{"_key": "detail1", "_value": "content detail 1"}, {"_key": "detail2", "_value": "content detail 2"}]',
        		'description' => $faker->text
        	];
        }
        DB::table('products')->insert($data);
    }
}
