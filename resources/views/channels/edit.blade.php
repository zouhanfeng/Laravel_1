@extends('app')

@section('title', '編輯特定頻道')

@section('theme', '編輯中的頻道')

@section('contents')
    @include('message.list')
    {!! Form::model($channel, ['method'=>'PATCH', 'action'=>['\App\Http\Controllers\ChannelsCtroller@update', $channel->id]]) !!}
    @include('channels.form', ['submitButtonText'=>'更新頻道資料'])
    {!! Form::close() !!}
@endsection

