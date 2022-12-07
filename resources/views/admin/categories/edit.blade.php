@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{$title}}
@endsection

@section('contentheader_title')
    {{$title}}
@endsection

@section('main-content')
<div class="container-fluid spark-screen">
    {!! Form::model($categories, [
    'method' => 'PATCH',
    'url' => ['/admin/categories', $categories->id],
    'class' => 'form-horizontal',
    'files' => true,
    'enctype'=>"multipart/form-data"
    ]) !!}

    @include ('admin.categories.form', ['submitButtonText' => __('Save')])

    {!! Form::close() !!}
</div>
@endsection