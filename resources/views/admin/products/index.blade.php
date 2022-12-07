@extends('adminlte::layouts.app')

@section('htmlheader_title')
{{$title}}
@endsection

@section('contentheader_title')
{{$title}}
@endsection

@section('main-content')
<a style="margin-bottom: 12px;" class="btn btn-info btn-sm" href="{{ url('admin/products/create') }}">Thêm mới sản phẩm</a>
<div class="container">
    <div class="card">
        <div class="card-body">
            @if (Session::has('thongbao'))
            <div class="alert alert-success">
                {{Session::get('thongbao')}}
            </div>
            @endif

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Thumbnail</th>
                        <th>Category</th>
                        <th>Content</th>
                        <th>Quantity</th>
                        <th>Old Price</th>
                        <th style="width:80px;">Sale Price</th>
                        <th>Updated</th>
                        <th style="width:90px;">&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($product as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->img }}</td>
                        <td>{{ $item->category->name }}</td>
                        <td>{{ $item->content }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ number_format($item->old_price) }}</td>
                        <td>{{ number_format($item->sale_price) }}</td>
                        <td>{{ $item->updated_at }}</td>
                        <td class="dropdown" style="display:flex;">
                            <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa-solid fa-screwdriver-wrench"></i>
                            </button>
                            <div class="dropdown-menu p-0">
                                <a href="{{ url('/admin/products/' . $item->id) }}" title="{{ __('message.user.view_user') }}">
                                    <button class="btn btn-info btn-sm dropdown-item"><i class="fa-solid fa-eye"></i></button>
                                </a>
                                <a href="{{ url('/admin/products/' . $item->id . '/edit') }}" title="{{ __('message.user.edit_user') }}">
                                    <button class="btn btn-primary btn-sm dropdown-item"><i class="fas fa-edit" aria-hidden="true"></i>
                                    </button>
                                </a>
                                {!! Form::open(['method' => 'DELETE','url' => ['/admin/products', $item->id],'style' => 'display:inline']) !!}
                                {!! Form::button('<i class="fa-solid fa-trash-can" aria-hidden="true"></i> ', array('type' => 'submit','class' => 'btn btn-danger btn-sm dropdown-item show_confirm','title' => __('message.user.delete_user'),
                                // 'onclick'=>'return confirm("'.'Xoá'.'")'
                                )) !!}
                                {!! Form::close() !!}
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $product->links() }}
        </div>
    </div>
</div>
@endsection