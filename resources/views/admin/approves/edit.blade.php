@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{$title}}
@endsection

@section('contentheader_title')
    {{$title}}
@endsection

@section('main-content')
<div class="container-fluid spark-screen">
    {!! Form::model($approve, [
    'method' => 'PATCH',
    'url' => ['/admin/approves', $approve->id],
    'class' => 'form-horizontal',
    'files' => true,
    'enctype'=>"multipart/form-data"
    ]) !!}

    @include ('admin.approves.form', ['submitButtonText' => __('Save')])

    {!! Form::close() !!}
</div>
@endsection