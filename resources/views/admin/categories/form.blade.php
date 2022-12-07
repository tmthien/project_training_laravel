

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="form-group">
            {!!Form::label('name', 'Tên danh mục')!!}
            {!!Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nhập tên danh mục']) !!}
            {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>
{!! Form::button('<i class="fa fa-check-circle"></i> ' . ($text = isset($submitButtonText) ? $submitButtonText : 'Save'), ['class' => 'btn btn-info btn-sm', 'type' => 'submit']) !!}
&nbsp;
    <a href="{{ url('admin/categories') }}" class="btn btn-sm btn-default">Back</a>


