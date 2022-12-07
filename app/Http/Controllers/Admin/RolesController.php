<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Permission;
use App\Models\Role;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = Role::paginate(5);
        return view('admin.roles.index', compact('role'),[
            'title'=>'Quản lý Vai trò',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::select('id', 'name', 'label')->orderBy('id', 'ASC')->get();
        return view('admin.roles.create',compact('permissions'),[
            'title'=>'Thêm mới Vai trò',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role = Role::create($request->all());
        if(!empty($request->permissions)) {
            foreach ( $request->permissions as $permission_name ) {
                // kiem tra neu la report thi save cac permission cua report
                if (strcmp($permission_name, "ReportsController@index")==0)
                {
                    $permission = Permission::whereName( "ReportsController@numberBookingByDate" )->first();
                    $role->givePermissionTo( $permission );
                    $permission = Permission::whereName( "ReportsController@numberBookingByMonth" )->first();
                    $role->givePermissionTo( $permission );
                    $permission = Permission::whereName( "ReportsController@numberBookingByYear" )->first();
                    $role->givePermissionTo( $permission );
                    $permission = Permission::whereName( "ReportsController@peopleBookingByDate" )->first();
                    $role->givePermissionTo( $permission );
                    $permission = Permission::whereName( "ReportsController@peopleBookingByMonth" )->first();
                    $role->givePermissionTo( $permission );
                    $permission = Permission::whereName( "ReportsController@peopleBookingByYear" )->first();
                    $role->givePermissionTo( $permission );
                    $permission = Permission::whereName( "ReportsController@financeBookingByDate" )->first();
                    $role->givePermissionTo( $permission );
                    $permission = Permission::whereName( "ReportsController@financeBookingByMonth" )->first();
                    $role->givePermissionTo( $permission );
                    $permission = Permission::whereName( "ReportsController@financeBookingByYear" )->first();
                    $role->givePermissionTo( $permission );
                }
                else
                {
                    // neu la cho phep them tour thi luu quyen copy tour
//                    if (strcmp($permission_name, "ToursController@store")==0)
//                    {
//                        $permission = Permission::whereName( "ToursController@getCopyTour" )->first();
//                        $role->givePermissionTo( $permission );
//                    }
                    // neu la cho phep sửa người dùng thì lưu quyền cho phép sửa profile
                    if (strcmp($permission_name, "UsersController@update")==0)
                    {
                        $permission = Permission::whereName( "UsersController@postProfile" )->first();
                        $role->givePermissionTo( $permission );
                    }
                    // them module @show vao khi co quyen xem tru HomeController
                    if (strcmp($permission_name, "HomeController@index")!=0 && in_array("index", explode("@", $permission_name)))
                    {
                        $tmp = explode("@", $permission_name)[0];
                        $permission = Permission::whereName( $tmp."@show" )->first();
                        $role->givePermissionTo( $permission );
                    }
                    $permission = Permission::whereName( $permission_name )->first();
                    $role->givePermissionTo( $permission );
                }
            }
        }

        return redirect('admin/roles');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $permissions = Permission::select('id', 'name', 'label')->get();
        return view('admin.roles.edit', compact('role', 'permissions'),[
            'title'=>'Chỉnh sửa Vai trò',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $role = Role::where('id', $id)->first();
        $role->update($request->all());

        $role->permissions()->detach();

        if(!empty($request->permissions)) {

            foreach ( $request->permissions as $permission_name ) {
                // kiem tra neu la report thi save cac permission cua report
                if (strcmp($permission_name, "ReportsController@index")==0)
                {
                    $permission = Permission::whereName( "ReportsController@numberBookingByDate" )->first();
                    $role->givePermissionTo( $permission );
                    $permission = Permission::whereName( "ReportsController@numberBookingByMonth" )->first();
                    $role->givePermissionTo( $permission );
                    $permission = Permission::whereName( "ReportsController@numberBookingByYear" )->first();
                    $role->givePermissionTo( $permission );
                    $permission = Permission::whereName( "ReportsController@peopleBookingByDate" )->first();
                    $role->givePermissionTo( $permission );
                    $permission = Permission::whereName( "ReportsController@peopleBookingByMonth" )->first();
                    $role->givePermissionTo( $permission );
                    $permission = Permission::whereName( "ReportsController@peopleBookingByYear" )->first();
                    $role->givePermissionTo( $permission );
                    $permission = Permission::whereName( "ReportsController@financeBookingByDate" )->first();
                    $role->givePermissionTo( $permission );
                    $permission = Permission::whereName( "ReportsController@financeBookingByMonth" )->first();
                    $role->givePermissionTo( $permission );
                    $permission = Permission::whereName( "ReportsController@financeBookingByYear" )->first();
                    $role->givePermissionTo( $permission );
                }
                else
                {

                    // neu la cho phep them tour thi luu quyen copy tour
//                    if (strcmp($permission_name, "ToursController@store")==0)
//                    {
//                        $permission = Permission::whereName( "ToursController@getCopyTour" )->first();
//                        $role->givePermissionTo( $permission );
//                    }
                    // neu la cho phep sửa người dùng thì lưu quyền cho phép sửa profile
                    if (strcmp($permission_name, "UsersController@update")==0)
                    {
                        $permission = Permission::whereName( "UsersController@postProfile" )->first();
                        $role->givePermissionTo( $permission );
                    }
                    // them module @show vao khi co quyen xem tru HomeController
                    if (strcmp($permission_name, "HomeController@index")!=0 && in_array("index", explode("@", $permission_name)))
                    {
                        $tmp = explode("@", $permission_name)[0];
                        $permission = Permission::whereName( $tmp."@show" )->first();
                        $role->givePermissionTo( $permission );
                    }
                    $permission = Permission::whereName( $permission_name )->first();
                    $role->givePermissionTo( $permission );
                }
            }
        }
        return redirect('admin/roles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Role::destroy($id);

        return redirect('admin/roles');
    }
}
