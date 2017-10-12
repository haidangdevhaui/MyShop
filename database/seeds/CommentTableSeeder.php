<?php

use Illuminate\Database\Seeder;
use Faker\Factory;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Factory::create();
        $products    = DB::table('products')->select('id')->get()->pluck('id')->toArray();
        $shops    = DB::table('shops')->select('id')->get()->pluck('id')->push(null)->toArray();
        $users    = DB::table('users')->select('id')->get()->pluck('id')->push(null)->toArray();
        $data     = [];
        for ($i = 0; $i < 200; $i++) {
            $data[]  = [
                'product_id'    => $products[rand(0, count($products) - 1)],
                'shop_id'    => $shops[rand(0, count($shops) - 1)],
                'user_id'    => $users[rand(0, count($users) - 1)],
                'content' => $faker->text
            ];
        }
        DB::table('comments')->insert($data);
    }
}
