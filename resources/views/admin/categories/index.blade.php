@extends('adminlte::layouts.app')

@section('htmlheader_title')
{{$title}}
@endsection

@section('contentheader_title')
{{$title}}
@endsection


@section('main-content')

<div class="container-fluid spark-screen">
    <div class="row">
        <a href="{{ url('admin/categories/create') }}" class="btn btn-sm btn-info">Thêm mới danh mục</a>
        <div class="col-md-10 col-md-offset-1">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Updated</th>
                        <th style="width:90px;">&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($category as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->updated_at }}</td>
                        <td class="dropdown" style="display:flex;">
                            <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa-solid fa-screwdriver-wrench"></i>
                            </button>
                            <div class="dropdown-menu p-0">
                                <a href="{{ url('/admin/categories/' . $item->id) }}" title="{{ __('message.user.view_user') }}">
                                    <button class="btn btn-info btn-sm dropdown-item"><i class="fa-solid fa-eye"></i></button>
                                </a>
                                <a href="{{ url('/admin/categories/' . $item->id . '/edit') }}" title="{{ __('message.user.edit_user') }}">
                                    <button class="btn btn-primary btn-sm dropdown-item"><i class="fas fa-edit" aria-hidden="true"></i>
                                    </button>
                                </a>
                                {!! Form::open(['method' => 'DELETE','url' => ['/admin/categories', $item->id],'style' => 'display:inline']) !!}
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
            {{ $category->links() }}
        </div>
    </div>

</div>

@endsection