<?php

use Faker\Factory;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $data  = [];
        for ($i = 0; $i < 50; $i++) {
            $data[] = [
                'full_name' => $faker->name,
                'email'     => $faker->email,
                'password'  => bcrypt('12345678'),
                'avatar'    => 'https://avatars1.githubusercontent.com/u/15893197?v=4&s=460',
            ];
        }
        DB::table('users')->insert($data);
    }
}
