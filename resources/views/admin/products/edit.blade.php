@extends('adminlte::layouts.app')

@section('htmlheader_title')
{{$title}}
@endsection

@section('contentheader_title')
{{$title}}
@endsection

@section('main-content')
<div class="container-fluid spark-screen">
    {!! Form::model($product, [
    'method' => 'PATCH',
    'url' => ['/admin/products', $product->id],
    'class' => 'form-horizontal',
    'files' => true,
    'enctype'=>"multipart/form-data"
    ]) !!}

    @include ('admin.products.form', ['submitButtonText' => __('Save')])

    {!! Form::close() !!}

</div>
@endsection