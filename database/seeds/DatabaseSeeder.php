<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(MallsTableSeeder::class);
        $this->call(ShopsTableSeeder::class);
        $this->call(AdminsTableSeed::class);
        $this->call(ProductCategoriesTableSeed::class);
        $this->call(ConfigsTableSeeder::class);
        $this->call(SalesTableSeeder::class);
        $this->call(SaleDetailsTableSeeder::class);
        $this->call(CommentTableSeeder::class);
    }
}
