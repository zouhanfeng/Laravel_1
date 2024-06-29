@extends('app')

@section('title', '建立團員表單')

@section('theme', '建立團員的表單')

@section('contents')
    @include('message.list')
    {!! Form::open(['url' => 'youtubers/store']) !!}
    @include('youtuber.form', ['submitButtonText'=>'新增團員資料'])
    {!! Form::close() !!}
@endsection
