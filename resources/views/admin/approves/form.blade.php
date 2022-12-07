

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="form-group">
            {!!Form::label('name', 'Trạng thái')!!}
            {!!Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nhập trạng thái']) !!}
            {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group">
            {!!Form::label('color', 'Màu sắc')!!}
            {{ Form::input('color', 'color', null, ['class' => 'form-control']) }}
            {!! $errors->first('name', '<p class="help-block">:message</p>') !!}

        </div>
    </div>
</div>
{!! Form::button('<i class="fa fa-check-circle"></i> ' . ($text = isset($submitButtonText) ? $submitButtonText : 'Save'), ['class' => 'btn btn-info btn-sm', 'type' => 'submit']) !!}
&nbsp;
    <a href="{{ url('admin/approves') }}" class="btn btn-sm btn-default">Back</a>
