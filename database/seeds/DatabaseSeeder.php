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
        DB::table('permissions')->insert(
            [
                [
                    'code' => 'ORDER_LIST',
                    'name' => 'Đơn hàng _ Danh sách',
                    'is_active' => false
                ],
                [
                    'code' => 'ORDER_ADD',
                    'name' => 'Đơn hàng _ Thêm',
                    'is_active' => false
                ],
                [
                    'code' => 'ORDER_EDIT',
                    'name' => 'Đơn hàng _ Sửa',
                    'is_active' => false
                ],

                [
                    'code' => 'CATEGORY_LIST',
                    'name' => 'Danh mục _ Dach sách',
                    'is_active' => false
                ],
                [
                    'code' => 'CATEGORY_ADD',
                    'name' => 'Danh mục _ Thêm',
                    'is_active' => false
                ],
                [
                    'code' => 'CATEGORY_EDIT',
                    'name' => 'Danh mục _ Sửa',
                    'is_active' => false
                ],
                [
                    'code' => 'CATEGORY_DELETE',
                    'name' => 'Danh mục _ Xóa',
                    'is_active' => false
                ],

                [
                    'code' => 'PRODUCT_LIST',
                    'name' => 'Sản phẩm _ Danh sách',
                    'is_active' => false
                ],
                [
                    'code' => 'PRODUCT_ADD',
                    'name' => 'Sản phẩm _ Thêm',
                    'is_active' => false
                ],
                [
                    'code' => 'PRODUCT_EDIT',
                    'name' => 'Sản phẩm _ Sửa',
                    'is_active' => false
                ],
                [
                    'code' => 'PRODUCT_DELETE',
                    'name' => 'Sản phẩm _ Xóa',
                    'is_active' => false
                ],

                [
                    'code' => 'ACCOUNT_LIST',
                    'name' => 'Tài khoản _ Danh sách',
                    'is_active' => false
                ],
                [
                    'code' => 'ACCOUNT_ADD',
                    'name' => 'Tài khoản _ Thêm',
                    'is_active' => false
                ],
                [
                    'code' => 'ACCOUNT_EDIT',
                    'name' => 'Tài khoản _ Sửa',
                    'is_active' => false
                ],

                [
                    'code' => 'BLOG_LIST',
                    'name' => 'Blog _ Danh sách',
                    'is_active' => false
                ],
                [
                    'code' => 'BLOG_ADD',
                    'name' => 'Blog _ Thêm',
                    'is_active' => false
                ],
                [
                    'code' => 'BLOG_EDIT',
                    'name' => 'Blog _ Sửa',
                    'is_active' => false
                ],
                [
                    'code' => 'BLOG_DELETE',
                    'name' => 'Blog _ Xóa',
                    'is_active' => false
                ],

                [
                    'code' => 'PIECE_LIST',
                    'name' => 'Đá _ Danh sách',
                    'is_active' => false
                ],
                [
                    'code' => 'PIECE_ADD',
                    'name' => 'Đá _ Thêm',
                    'is_active' => false
                ],
                [
                    'code' => 'PIECE_EDIT',
                    'name' => 'Đá _ Sửa',
                    'is_active' => false
                ],
                [
                    'code' => 'PIECE_DELETE',
                    'name' => 'Đá _ Xóa',
                    'is_active' => false
                ],

                [
                    'code' => 'CHARM_LIST',
                    'name' => 'Charm _ Danh sách',
                    'is_active' => false
                ],
                [
                    'code' => 'CHARM_ADD',
                    'name' => 'Charm _ Thêm',
                    'is_active' => false
                ],
                [
                    'code' => 'CHARM_EDIT',
                    'name' => 'Charm _ Sửa',
                    'is_active' => false
                ],
                [
                    'code' => 'CHARM_DELETE',
                    'name' => 'Charm _ Xóa',
                    'is_active' => false
                ],

                [
                    'code' => 'TOPIC_LIST',
                    'name' => 'Topic _ Danh sách',
                    'is_active' => false
                ],
                [
                    'code' => 'TOPIC_ADD',
                    'name' => 'Topic _ Thêm',
                    'is_active' => false
                ],
                [
                    'code' => 'TOPIC_EDIT',
                    'name' => 'Topic _ Sửa',
                    'is_active' => false
                ],
                [
                    'code' => 'TOPIC_DELETE',
                    'name' => 'Topic _ Xóa',
                    'is_active' => false
                ],

                [
                    'code' => 'ADVISORY',
                    'name' => 'Tư vấn',
                    'is_active' => false
                ],
                
                [
                    'code' => 'OWNER',
                    'name' => 'OWNER',
                    'is_active' => false
                ]
            ]
        );
    }
}
