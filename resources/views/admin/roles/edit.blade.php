@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{$title}}
@endsection

@section('contentheader_title')
    {{$title}}
@endsection

@section('main-content')    
    <div class="bg-light p-4 rounded">
        <div class="container mt-4">
        <form action="{{ route('roles.update',$role->id) }}" method="POST">
        @csrf
        @method('PUT')
                <div class="row">
                    <div class="col col-md-4">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input value="{{$role->name}}" type="text" class="form-control" name="name" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label for="label">Label</label>
                            <input value="{{$role->label}}" type="text" class="form-control" name="label" placeholder="Label">
                        </div>
                    </div>
                </div>
                @php($rolePermission = isset($role)?$role->Permissions->pluck('name')->toArray():[])

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">STT</th>
                            <th width="20%" class="text-left">Chức năng</th>
                            <th scope="col" class="text-left">Xem</th>
                            <th scope="col" class="text-left">Thêm</th>
                            <th scope="col" class="text-left">Sửa</th>
                            <th scope="col" class="text-left">Xoá</th>
                            <th>
                                <input type="checkbox" name="chkAll" id="chkAll" />
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php ($counter=0)
                        @php ($strModule="")
                        @php ($arrPers="")
                        @php ($index="")
                        @php ($create="")
                        @php ($update="")
                        @php ($destroy="")
                        @php ($rchk="")
                        @php ($test = $permissions->pluck('name'))
                    @for ($i = 0; $i < count($permissions); $i++) @php ($permission=$permissions[$i]) @php ($arrPers=explode("@", $permission ->name))
                        @if(strcmp($strModule, $arrPers[0])!=0)
                        @php ($counter++)
                        @php($strModule = $arrPers[0])
                        @if(in_array($strModule."@index", $rolePermission))
                        @php($index = 'checked')
                        @endif
                        @if(in_array($strModule."@store", $rolePermission))
                        @php($create = 'checked')
                        @endif
                        @if(in_array($strModule."@update", $rolePermission))
                        @php($update = 'checked')
                        @endif
                        @if(in_array($strModule."@destroy", $rolePermission))
                        @php($destroy = 'checked')
                        @endif
                        @if(strcmp($index, "checked") == 0 && strcmp($create, "checked") == 0 &&
                        strcmp($update, "checked") ==0 && strcmp($destroy, "checked") == 0)
                        @php($rchk = 'checked')
                        @else
                        @php($rchk = "")
                        @endif
                        <tr>
                            <td class="text-center "><span>{{ $counter }}</span></td>
                            <td class="text-left" width="20%" ><span>{{ $permission->label }}</span></td>
                            <td class="text-middle">
                                <div class="custom-control custom-checkbox ">
                                    @if($test->contains($strModule."@index") || $test->contains($strModule."@numberBookingByDate"))
                                    <input type="checkbox" class="custom-control" name="permissions[]" id={{$strModule}} {{ $index }} value={{$strModule."@index"}}>
                                    @endif
                                </div>
                            </td>
                            <td class="text-middle">
                                <div class="custom-control custom-checkbox acb">
                                    @if($test->contains($strModule."@store"))
                                    <input type="checkbox" class="custom-control" name="permissions[]" id={{$strModule}} {{ $create }} value={{$strModule."@store"}}>
                                    @endif
                                </div>
                            </td>
                            <td class="text-middle">
                                <div class="custom-control custom-checkbox acb">
                                    @if($test->contains($strModule."@update"))
                                    <input type="checkbox" class="custom-control" name="permissions[]" id={{$strModule}} {{ $update }} value={{$strModule."@update"}}>
                                    @endif
                                </div>
                            </td>
                            <td class="text-middle">
                                <div class="custom-control custom-checkbox acb">
                                    @if($test->contains($strModule."@destroy"))
                                    <input type="checkbox" class="custom-control" name="permissions[]" id={{$strModule}} {{ $destroy }} value={{$strModule."@destroy"}}>
                                    @endif
                                </div>
                            </td>
                            <td class="text-middle">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="chkRole" id="chkRole" {{$rchk}} onclick="ActiveModule($(this), '{{$strModule}}');" />
                                </div>
                            </td>
                        </tr>
                        @php ($index="")
                        @php ($create="")
                        @php ($update="")
                        @php ($destroy="")
                        @endif

                        @endfor
                        </tbody>
                </table>

                <button type="submit" class="btn btn-sm btn-info"><i class="fa fa-check-circle"></i> Save</button>
                <a href="{{ route('roles.index') }}" class="btn btn-sm btn-default">Back</a>
            </form>
        </div>

    </div>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
    function ActiveModule(parent, chkName) {
        $("input[id=" + chkName + "]").prop('checked', parent.prop("checked"));
    }
    $(function() {
        $('#chkAll').on('click', function(e) {
            $("input:checkbox").prop('checked', $(this).prop("checked"));
        });
        $('form').submit(function(e) {
            var $lst = $("input[name='" + "permissions[]" + "']:not(:checked)");
            $lst.prop('name', "p1");
            return true;
        });
    })
</script>