@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{$title}}
@endsection

@section('contentheader_title')
    {{$title}}
@endsection

@section('main-content')    
<div class="container-fluid spark-screen">
    <a class="btn btn-primary btn-sm" href="{{ url('/admin/approves/create') }}">Thêm mới</a>
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
                                    <th>Trạng thái</th>
                                    <th>Màu sắc</th>
                                    <th>Updated</th>
                                    <th style="width:90px;">&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($approve as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>
                                            <span class="label-color btn btn-sm" style="background-color: {{ $item->color }}; min-width:70px">{{ $item->color }}</span>
                                        </td>
                                        <td>{{ $item->updated_at }}</td>
                                        <td style="display:flex;">
                                            <a href="{{ route('approves.edit', $item->id) }}"style="margin-right:4px;" class="btn btn-info btn-sm">Sửa</a>
                                            <form method="POST" action="{{ route('approves.destroy', $item->id) }}" onclick="return confirm('Bạn có thực sự muốn xoá?');">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-danger btn-sm" type="submit">Xoá</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $approve->links() }}
                    </div>
                </div>  
			</div>
		</div>
	</div>
@endsection