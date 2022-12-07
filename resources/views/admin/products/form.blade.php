<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {!!Form::label('name', 'Tên sản phẩm')!!}
            {!!Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nhập tên sản phẩm']) !!}
            {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group">
            {!! Form::label('category_id', 'Tên danh mục') !!}
            {!! Form::select('category_id', $category , null, ['class' => 'form-control']) !!}
            {!! $errors->first('category_id', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group">
            {!!Form::label('content', 'Nội dung')!!}
            {!!Form::textarea('content', null, ['class' => 'form-control', 'placeholder' => 'Nhập nội dung']) !!}
            {!! $errors->first('content', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="col-md-1"></div>
    <div class="col-md-5">
        <div class="form-group">
            {!!Form::label('quantity', 'Số lượng sản phẩm')!!}
            {!!Form::number('quantity', null, ['class' => 'form-control', 'placeholder' => 'Nhập số lượng sản phẩm']) !!}
            {!! $errors->first('quantity', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group">
            {!!Form::label('sale_price', 'Giá bán')!!}
            {!!Form::number('sale_price', null, ['class' => 'form-control', 'placeholder' => 'Nhập giá bán']) !!}
            {!! $errors->first('sale_price', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group">
            {!!Form::label('old_price', 'Giá gốc')!!}
            {!!Form::number('old_price', null, ['class' => 'form-control', 'placeholder' => 'Nhập giá gốc']) !!}
            {!! $errors->first('old_price', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group">
            {!!Form::label('file_upload', 'Hình ảnh sản phẩm')!!}
            {!!Form::file('file_upload', null, ['class' => 'form-control', 'id'=>'file_upload']) !!}
            {!! $errors->first('file_upload', '<p class="help-block">:message</p>') !!}
        </div>
        @if( isset($product->img) )
        <div class="img-product">
            <img class="img-thumbnail" style="width:50%;" src="/{{ $product->img ?? "" }}" alt="">
        </div>
        @else
        <div class="img-product" style="display: none;">
        </div>
        @endif
    </div>
</div>
{!! Form::button('<i class="fa fa-check-circle"></i> ' . ($text = isset($submitButtonText) ? $submitButtonText : 'Save'), ['class' => 'btn btn-info btn-sm', 'type' => 'submit']) !!}
&nbsp;
<a href="{{ url('admin/products') }}" class="btn btn-sm btn-default">Back</a>