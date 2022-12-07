@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{$title}}
@endsection

@section('contentheader_title')
    {{$title}}
@endsection

@section('main-content')
    <div class="container-fluid spark-screen">
        {!! Form::open(['url' => '/admin/approves', 'class' => 'form-horizontal', 'files' => true,'multiple' => true,'enctype' => "multipart/form-data"]) !!}
            @include('admin.approves.form')
        {!! Form::close() !!}
    </div>
@endsection