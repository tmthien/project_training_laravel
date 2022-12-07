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
        <div class="col-md-8 col-md-offset-2">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Role</th>
                        <th>Updated</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($user as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>
                            @foreach ($item->roles as $index=>$role)
                            <span>{{ $role->label }}</span>
                            @endforeach
                        </td>
                        <td>{{ $item->updated_at }}</td>
                    @endforeach
                </tbody>
            </table>
            {{ $user->links() }}
        </div>
    </div>

</div>

@endsection