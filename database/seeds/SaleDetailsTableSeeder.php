<?php

use Illuminate\Database\Seeder;

class SaleDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sales    = DB::table('sales')->select('id')->get()->pluck('id')->toArray();
        $products = DB::table('products')->select('id', 'total_numb')->get();
        $data     = [];
        for ($i = 0; $i < 20; $i++) {
            $product = $products[rand(0, count($products) - 1)];
            $data[]  = [
                'sale_id'    => $sales[rand(0, count($sales) - 1)],
                'product_id' => $product->id,
                'sale_numb'  => $product->total_numb % 2 == 0 ? $product->total_numb / 2 : ($product->total_numb - 1) / 2,
            ];
        }
        DB::table('sale_details')->insert($data);
    }
}
