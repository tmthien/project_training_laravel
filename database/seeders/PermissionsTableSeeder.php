<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arPermissions = [
            "1" => ["HomeController@index", "Trang chủ"],

            "2" => ["UsersController@index", "Tài khoản người dùng"],
            "3" => ["UsersController@show", "Tài khoản người dùng"],
            //Trường hợp cho phép người dùng sửa, thì cho phép sửa profile của người dùng đó

            //Quản lý vai trò
            "7" => ["RolesController@index", "Quản lý Vai trò"],
            "8" => ["RolesController@show", "Quản lý Vai trò"],
            "9" => ["RolesController@store", "Quản lý Vai trò"],
            "10" => ["RolesController@update", "Quản lý Vai trò"],
            "11" => ["RolesController@destroy", "Quản lý Vai trò"],
            
            //Danh mục sản phẩm
            "12" =>["CategoryController@index", "Quản lý danh mục sản phẩm"],
            "13" =>["CategoryController@show", "Quản lý danh mục sản phẩm"],
            "14" =>["CategoryController@store", "Quản lý danh mục sản phẩm"],
            "15" =>["CategoryController@update", "Quản lý danh mục sản phẩm"],
            "16" =>["CategoryController@destroy", "Quản lý danh mục sản phẩm"],

            //Quản lý sản phẩm
            "17" =>["ProductController@index", "Quản lý sản phẩm"],
            "18" =>["ProductController@show", "Quản lý sản phẩm"],
            "19" =>["ProductController@store", "Quản lý sản phẩm"],
            "20" =>["ProductController@update", "Quản lý sản phẩm"],
            "21" =>["ProductController@destroy", "Quản lý sản phẩm"],

            //Quản lý trạng thái đơn hàng
            "22" =>["ApproveController@index", "Quản lý trạng thái đơn hàng"],
            "23" =>["ApproveController@show", "Quản lý trạng thái đơn hàng"],
            "24" =>["ApproveController@store", "Quản lý trạng thái đơn hàng"],
            "25" =>["ApproveController@update", "Quản lý trạng thái đơn hàng"],
            "26" =>["ApproveController@destroy", "Quản lý trạng thái đơn hàng"],
        ];

        //ADD PERMISSIONS - Thêm các quyền
        DB::table('permissions')->delete(); //empty permission
        $addPermissions = [];
        foreach ($arPermissions as $name => $label) {
            $addPermissions[] = [
                'id' => $name,
                'name' => $label[0],
                'label' => $label[1],
            ];
        }
        DB::table('permissions')->insert($addPermissions);

        //ADD ROLE - Them vai tro
        //        DB::table( 'roles' )->delete();//empty permission
        $datenow = date('Y-m-d H:i:s');
        $role = [
            ['id' => 1, 'name' => 'admin', 'label' => 'Admin', 'created_at' => $datenow, 'updated_at' => $datenow],
        ];

        $addRoles = [];
        foreach ($role as $key => $label) {
            if (\App\Models\Role::where('id', $label['id'])->count() == 0) {
                $addRoles[] = [
                    'id' => $label['id'],
                    'name' => $label['name'],
                    'label' => $label['label'],
                    'created_at' => $datenow,
                    'updated_at' => $datenow,
                ];
            }
        }
        //KIỂM TRA VÀ THÊM CÁC VAI TRÒ TRUYỀN VÀO NẾU CÓ
        if (count($addRoles) > 0) {
            DB::table('roles')->insert($addRoles);
        }

        //BỔ SUNG ID QUYỀN NẾU CÓ
        //Full quyền Admin
        $persAdmin = \App\Models\Permission::pluck('id');

        //Gán quyền vào Vai trò Admin
        $rolePerAdmin = \App\Models\Role::findOrFail(1);
        $rolePerAdmin->permissions()->sync($persAdmin);

        // //Gán quyền vào vai trò Employee
        // $rolePerEmployee = \App\Models\Role::findOrFail(2);
        // $rolePerEmployee->permissions()->sync($persEmployee);

        // //Gán quyền vào Vai trò Customer
        // $rolePerCustomer = \App\Models\Role::findOrFail(3);
        // $rolePerCustomer->permissions()->sync($persCustomer);

        //Set tài khoản ID=1 là Admin
        $roleAdmin = \App\Models\User::findOrFail(1);
        $roleAdmin->roles()->sync([1]);
        //Set tài khoản ID=2 là User
        // $roleUser = \App\Models\User::findOrFail(2);
        // $roleUser->roles()->sync([2]);
        // //Set tài khoản ID=3 là Customer
        // $roleCustomer = \App\Models\User::findOrFail(3);
        // $roleCustomer->roles()->sync([3]); 
    }
}
