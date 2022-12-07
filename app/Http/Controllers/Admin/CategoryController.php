<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::paginate(5);
        return view('admin.categories.index',compact('category'), [
            'title' => 'Quản lý danh mục'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create', [
            'title' => 'Thêm mới danh mục'
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
        $this->validate(
            $request,
            [
                'name' => 'required|unique:categories,name',
            ],
            [
                'name.unique' => 'Tên danh mục đã tồn tại',
                'name.required' => 'Vui lòng nhập tên danh mục'
            ]
        );
        $input = $request->all();
        $category = Category::create($input);
        return redirect('/admin/categories');
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
    public function edit($id)
    {
        $categories = Category::where('id', $id)->first();
        return view('admin.categories.edit', compact('categories'), [
            'title' => 'Chỉnh sửa danh mục'
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
        $categories = Category::where('id', $id)->first();
        $this->validate(
            $request,
            [
                'name' => 'required|unique:categories,name,' .$id,
            ],
            [
                'name.unique' => 'Tên danh mục đã tồn tại',
                'name.required' => 'Vui lòng nhập tên danh mục'
            ]
        );
        $input = $request->all();
        $categories->update($input);
        return redirect('admin/categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::destroy($id);
        return redirect('admin/categories');
    }
}
