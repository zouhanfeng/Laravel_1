
@extends('app')

@section('title', '編輯特定資料')

@section('theme', '編輯中的資料')

@section('contents')
    @include('message.list')
    {!! Form::model($youtuber, ['method'=>'PATCH', 'action'=>['\App\Http\Controllers\YoutuberController@update', $youtuber->id]]) !!}
    @include('youtuber.form', ['submitButtonText'=>"更新團員資料"])
    {!! Form::close() !!}

@endsection
