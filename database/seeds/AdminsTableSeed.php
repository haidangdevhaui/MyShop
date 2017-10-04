<?php

use Illuminate\Database\Seeder;

class AdminsTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'id'       => 1,
            'name'     => 'ADMIN',
            'email'    => 'admin@gmail.com',
            'password' => bcrypt('12345678'),
        ]);
    }
}
