<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::paginate(10);
        $category = Category::all();
        return view('admin.products.index', compact('product', 'category'), [
            'title'=>'Quản lý sản phẩm'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all()->pluck('name','id');
        $category->prepend('--Vui lòng chọn danh mục--')->all();
        return view('admin.products.create', compact('category'), [
           'title'=>'Thêm mới sản phẩm' 
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
                'name' => 'required|unique:products,name',
                'sale_price' => 'required',
                'old_price' => 'required',
                'quantity' => 'required',
            ],
            [
                'name.unique' => 'Tên sản phẩm đã tồn tại',
                'name.required' => 'Vui lòng nhập tên sản phẩm',
                'sale_price.required' => 'Vui lòng nhập giá bán',
                'old_price.required' => 'Vui lòng nhập giá gốc',
                'quantity.required' => 'Vui lòng nhập số lượng',
            ]
        );
        if($request->has('file_upload'))
        {
            $file = $request->file_upload;
            $extension = $request->file_upload->extension();
            $file_name = 'uploads/'.time().'-'.'product.'.$extension;
            $file->move(public_path('uploads'), $file_name);
        }

        $request->merge(['img' => $file_name]);

        $product = Product::create($request->all());
        return redirect('admin/products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::where('id', $id)->first();
        return view('admin.products.show',compact('product'), [
            'title'=>'Thông tin sản phẩm'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::where('id', $id)->first();
        $category = Category::all()->pluck('name', 'id');
        $category->prepend('--Vui chọn danh mục--')->all();
        return view('admin.products.edit', compact('category','product'),[
            'title'=>'Chỉnh sửa sản phẩm'
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
        $product = Product::where('id', $id)->first();
        if($request->has('file_upload'))
        {
            $file = $request->file_upload;
            $extension = $request->file_upload->extension();
            $file_name = 'uploads/'.time().'-'.'product.'.$extension;
            $file->move(public_path('uploads'), $file_name);
        }
        $request->merge(['img' => $file_name]);
        
        $product->update($request->all());
        return redirect('admin/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);
        return redirect('admin/products');
    }
}
