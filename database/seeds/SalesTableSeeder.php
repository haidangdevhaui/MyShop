<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class SalesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $malls = DB::table('malls')->select('id')->get()->pluck('id')->toArray();
        $data  = [
            [
                'mall_id'     => $malls[rand(0, count($malls) - 1)],
                'type'        => config('constant.sale_type_money'),
                'sale_value'  => 100000,
                'name'        => 'Sale type money',
                'slug'        => str_slug('Sale type money'),
                'description' => 'description of sale type money',
                'expired_at'  => Carbon::now()->addDays(15)->toDateString(),
            ],
            [
                'mall_id'     => $malls[rand(0, count($malls) - 1)],
                'type'        => config('constant.sale_type_percent'),
                'sale_value'  => 10,
                'name'        => 'Sale type percent',
                'slug'        => str_slug('Sale type percent'),
                'description' => 'description of sale type percent',
                'expired_at'  => Carbon::now()->toDateString(),
            ],
        ];
        DB::table('sales')->insert($data);
    }
}
