@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{$title}}
@endsection

@section('contentheader_title')
    {{$title}}
@endsection
    
@section('main-content')    
<div class="container-fluid spark-screen">
    <a class="btn btn-info btn-sm" href="{{ route('roles.create') }}">Thêm mới</a>
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
                <div class="card">
                    <div class="card-body">
                        @if (Session::has('thongbao'))
                            <div class="alert alert-success">
                                {{Session::get('thongbao')}}
                            </div>
                        @endif

                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Role</th>
                                    <th>Updated</th>
                                    <th style="width:90px;">&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($role as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->label }}</td>
                                        <td>{{ $item->updated_at }}</td>
                                        <td style="display:flex;">
                                            <a href="{{ route('roles.edit', $item->id) }}"style="margin-right:4px;" class="btn btn-info btn-sm">Sửa</a>
                                            <form method="POST" action="{{ route('roles.destroy', $item->id) }}" onclick="return confirm('Bạn có thực sự muốn xoá?');">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-danger btn-sm" type="submit">Xoá</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $role->links() }}
                    </div>
                </div>  
			</div>
		</div>
	</div>
@endsection