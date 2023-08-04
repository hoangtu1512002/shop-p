<?php

namespace App\Http\View;

use Illuminate\View\View;

class Menu
{
    public function compose(View $view)
    {
        $menus = collect([
            (object) [
                'name' => 'Tổng quát',
                'route' => 'admin.dashboard',
                'view' => 'view-dashboard', // lấy tại file AuthServiceProvider
                'icon' => '<i class="ti ti-layout-dashboard"></i>',
            ],
            (object) [
                'name' => 'Danh mục',
                'route' => 'admin.category.view',
                'view' => 'view-category',
                'icon' => '<i class="ti ti-brand-coinbase"></i>',
                'child' => [
                    (object) [
                        'name' => 'Thêm danh mục mới',
                        'view' => 'create-category', // lấy tại file AuthServiceProvider
                        'route' => 'admin.category.create'
                    ],
                    (object) [
                        'name' => 'Đang sử dụng',
                        'route' => 'admin.category.view'
                    ],
                    (object) [
                        'name' => 'Đã ngưng sử dụng',
                        'route' => 'admin.category.stop.selling.view'
                    ],
                ]
            ],
            (object) [
                'name' => 'Quản lý sản phẩm',
                'route' => 'admin.product.view',
                'view' => 'view-product',
                'icon' => '<i class="ti ti-brand-producthunt"></i>',
                'child' => [
                    (object) [
                        'name' => 'Tất cả sản phẩm',
                        'route' => 'admin.product.view'
                    ],
                    (object) [
                        'name' => 'Thêm sản phẩm mới',
                        'route' => 'admin.product.create'
                    ]
                ]
            ],
            (object) [
                'name' => 'Người dung',
                'route' => 'admin.user.management.staff',
                'view' => 'view-user-manager',
                'icon' => '<i class="ti ti-users"></i>',
                'child' => [
                    (object) [
                        'name' => 'Quản lý nhân viên',
                        'route' => 'admin.user.management.staff'
                    ],
                    (object) [
                        'name' => 'Thêm mới nhân viên',
                        'route' => 'admin.user.management.staff.create',
                        'view' => 'create-user'
                    ],
                    (object) [
                        'name' => 'Khách hàng',
                        'route' => 'admin.user.management.customer'
                    ],
                ]
            ]
        ]);
        $view->with('menus', $menus);
    }
}
