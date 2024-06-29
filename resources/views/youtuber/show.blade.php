

@extends('app')

@section('title', '顯示特定Youtuber')

@section('theme', '您所選取的Youtuber資料')

@section('contents')
    Youtuber姓名:{{$youtuber->yt_name}}<br/>
    頻道編號:{{$youtuber->channel->c_name}}<br/>
    年齡:{{$youtuber->year }}<br/>
    年資：{{ $youtuber->onboarddate }}<br/>
    學歷:{{$youtuber->education}}<br/>
    國籍:{{$youtuber->country}}<br/>
@endsection
