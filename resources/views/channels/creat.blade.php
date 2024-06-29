
@extends('app')

@section('title', '建立頻道表單')

@section('theme', '建立頻道的表單')

@section('contents')
    @include('message.list')
    {{-- 通知route 去這個地方 --}}
    {{Form::open(['url' => 'channels/store'])}}
    {{--{!! Form::open(array('url' => 'channels/store')) !!}--}}
    {{--{{ Form::open(array('route' => 'c_store')) }}--}}
    {{--{{Form::open(['action' => 'ChannelsController@store'])}}  不能用--}}
    @include('channels.form', ['submitButtonText'=>'新增頻道資料'])
    {!! Form::close() !!}

@endsection




