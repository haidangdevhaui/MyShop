<?php

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
        DB::table('users')->insert([
            'full_name' => 'Vu Hai Dang',
            'email' => 'haidangdevhaui@gmail.com',
            'password' => bcrypt('12345678'),
            'avatar' => 'https://avatars1.githubusercontent.com/u/15893197?v=4&s=460',
        ]);
    }
}
