@extends('app')

@section('title', '所有頻道')

@section('theme', '所有頻道')

@section('contents')

    <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l">
        <a href="{{ route('c_create') }} ">新增頻道</a>
        <a href="{{ route('c_asia') }} ">亞洲頻道</a>
        <a href="{{ route('c_others') }} ">其他州</a>
        <a href="{{ route('channels') }} ">所有頻道</a>
    </div>
    <table>
        <tr>
            <th>頻道名稱</th>
            <th>頻道類別</th>
            <th>粉絲數(萬)</th>
            <th>平均觀看人數(萬)</th>
            <th>地區</th>
            <th>操作1</th>
            <th>操作2</th>
        </tr>
        @foreach( $channel  as $get)
            <tr>
                <td> {{$get->c_name}}  </td>
                <td> {{$get->category}}  </td>
                <td> {{$get->fans}}  </td>
                <td> {{$get->views}}  </td>
                <td> {{$get->state}}  </td>
                <td><a href="{{ route('c_show', ['id'=>$get->id]) }}">顯示</a></td>
                <td><a href="{{ route('c_edit', ['id'=>$get->id]) }}">修改</a></td>
                <td>
                    <form action="{{ url('/channels/delete', ['id' => $get->id]) }}" method="post">
                        <input class="btn btn-default" type="submit" value="刪除" />
                        @method('delete')
                        @csrf
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

@endsection


