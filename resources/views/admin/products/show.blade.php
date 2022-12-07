@extends('adminlte::layouts.app')

<style>
    .border {
        border: 1px solid #ccc;
        border-radius: 5px;
    }
</style>

@section('htmlheader_title')
{{$title}}
@endsection

@section('contentheader_title')
{{$title}}
@endsection

@section('main-content')
<div class="row ">
    <div class="col-md-4 col-md-offset-1 ">
        <div class="img-product">
            <img class="img-thumbnail" src="/{{$product->img}}" alt="">
        </div>
    </div>
    <div class="col-md-5 col-md-offset-1 border">
        <div class="form-group">
            <span>Tên sản phẩm: </span> <strong>{{ $product->name }}</strong>
        </div>
        <div class="form-group">
            <p>{{ $product->content }}</p>
        </div>
        <div class="form-group">
            <span>Giá bán: </span> <strong style="margin-right: 20px;">{{ number_format($product->sale_price) }}đ</strong>
            <span>Giá gốc: </span> <del>{{ number_format($product->old_price) }}đ</del>
        </div>
        <div class="form-group">
            <span>Số lượng: {{ $product->quantity }}</span>
        </div>
    </div>
</div> </br>

<a href="{{ url('/admin/products/' . $product->id . '/edit') }}" class="btn btn-sm btn-info">Chỉnh sửa</a>
&nbsp;
<a href="{{ url('/admin/products') }}" class="btn btn-sm btn-default">Back</a>
@endsection