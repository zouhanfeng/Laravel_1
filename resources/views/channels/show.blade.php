
@extends('app')

@section('title', '顯示特定頻道')

@section('theme', '您所選取的頻道資料')

@section('contents')
    頻道名稱:{{$channel->c_name}}<br/>
    頻道類別:{{$channel->category}}<br/>
    粉絲數(萬):{{$channel->fans}}<br/>
    平均觀看量(萬):{{$channel->views}}<br/>
    地區:{{$channel->state}}<br/>

<div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l">
        {{ $channel->c_name }}所有Youtuber
    </div>
    <table>
        <tr>
            <th>Youtuber編號</th>
            <th>姓名</th>
            <th>年齡</th>
            <th>年資</th>
            <th>學歷</th>
            <th>國家</th>
        </tr>
        @foreach($youtubers as $youtuber)
            <tr>
                <td>{{ $youtuber->id }}</td>
                <td>{{ $youtuber->yt_name }}</td>
                <td>{{ $youtuber->year }}</td>
                <td>{{ $youtuber->onboarddate }}</td>
                <td>{{ $youtuber->education }}</td>
                <td>{{ $youtuber->country }}</td>
            </tr>
        @endforeach
    </table>
@endsection
