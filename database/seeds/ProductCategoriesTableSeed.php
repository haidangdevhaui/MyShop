<?php

use Illuminate\Database\Seeder;

class ProductCategoriesTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'id'       => 1,
                'admin_id' => 1,
                'name'     => 'Thời trang',
                'slug'     => 'thoi-trang',
                'image'    => 'http://res.cloudinary.com/dg6jnduzv/image/upload/c_pad,h_60,w_90/v1506566292/myshop/category/ao.jpg',
            ],
            [
                'id'       => 2,
                'admin_id' => 1,
                'name'     => 'Xe máy',
                'slug'     => 'xe-may',
                'image'    => 'http://res.cloudinary.com/dg6jnduzv/image/upload/c_pad,h_60,w_90/v1506566292/myshop/category/bike.jpg',
            ],
            [
                'id'       => 3,
                'admin_id' => 1,
                'name'     => 'Máy tính',
                'slug'     => 'may-tinh',
                'image'    => 'http://res.cloudinary.com/dg6jnduzv/image/upload/c_pad,h_60,w_90/v1506566292/myshop/category/imac.jpg',
            ],
            [
                'id'       => 4,
                'admin_id' => 1,
                'name'     => 'Phụ kiện',
                'slug'     => 'phu-kien',
                'image'    => 'http://res.cloudinary.com/dg6jnduzv/image/upload/c_pad,h_60,w_90/v1506566292/myshop/category/loa.jpg',
            ],
            [
                'id'       => 5,
                'admin_id' => 1,
                'name'     => 'Máy ảnh',
                'slug'     => 'may-anh',
                'image'    => 'http://res.cloudinary.com/dg6jnduzv/image/upload/c_pad,h_60,w_90/v1506566292/myshop/category/mayanh.jpg',
            ],
            [
                'id'       => 6,
                'admin_id' => 1,
                'name'     => 'Điện thoại',
                'slug'     => 'dien-thoai',
                'image'    => 'http://res.cloudinary.com/dg6jnduzv/image/upload/c_pad,h_60,w_90/v1506566292/myshop/category/phone.jpg',
            ],
            [
                'id'       => 7,
                'admin_id' => 1,
                'name'     => 'Đồ chơi',
                'slug'     => 'do-choi',
                'image'    => 'http://res.cloudinary.com/dg6jnduzv/image/upload/c_pad,h_60,w_90/v1506566292/myshop/category/toy.jpg',
            ],
            [
                'id'       => 8,
                'admin_id' => 1,
                'name'     => 'Đồng hồ',
                'slug'     => 'dong-ho',
                'image'    => 'http://res.cloudinary.com/dg6jnduzv/image/upload/c_pad,h_60,w_90/v1506566292/myshop/category/dongho.jpg',
            ],
        ];
        DB::table('product_categories')->insert($data);
    }
}
