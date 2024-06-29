<?php

namespace App\Http\Controllers;

use App\Models\channel;
use Carbon\Carbon;
use App\Http\Requests\CreateChannelRequest;
use Illuminate\Http\Request;

class ChannelsController extends Controller
{
    //
    function index()
    {
        $channels = channel::all();

        return view('channels.index',['channel'=>$channels]);
    }
    function creat()
    {

        return view('channels.creat');
    }

    public function edit($id)
    {
        $channel = channel::findOrFail($id);
        return view('channels.edit', ['channel'=>$channel]);
    }

    function show($id)
    {
        $channel=channel::findorfail($id);
        $youtubers = $channel->youtubers ;

        return view('channels.show',['youtubers'=>$youtubers,'channel'=>$channel]);
    }
    public function destroy($id)
    {
        $channel = channel::findOrFail($id);
        $channel->delete();
        return redirect('channels');
    }
    public function Asia()
    {
        $channels = channel::where('state', '=',"亞洲")->get();

        return view('channels.index', ['channel'=>$channels]);
    }

    public function Others()
    {
        $channels = channel::where('state', '!=',"亞洲")->get();

        return view('channels.index', ['channel'=>$channels]);
    }
    public function store(CreateChannelRequest $request)
    {
        $c_name = $request->input('c_name');
        $category = $request->input('category');
        $state = $request->input('state');
        $views = $request->input('views');
        $fans = $request->input('fans');

        channel::create([
            'c_name' => $c_name,
            'category' => $category,
            'state' => $state,
            'views' =>$views,
            'fans' => $fans,
            'created' => Carbon::now()
        ]);

        return redirect('channels');
    }
    public function update($id, CreateChannelRequest $request)
    {
        $channel = channel::findOrFail($id);

        $channel->c_name = $request->input('c_name');
        $channel->category = $request->input('category');
        $channel->fans = $request->input('fans');
        $channel->views = $request->input('views');
        $channel->state = $request->input('state');
        $channel->save();

        return redirect('channels');
    }
    public function api_delete(Request $request)
    {
        $channel = channel::find($request->input('id'));

        if ($channel == null)
        {
            return response()->json([
                'status' => 0,
            ]);
        }

        if ($channel->delete())
        {
            return response()->json([
                'status' => 1,
            ]);
        }

    }
    public function api_teams()
    {
        return channel ::all();
    }

    public function api_update(Request $request)
    {
        $channel = channel::find($request->input('id'));
        if ($channel == null)
        {
            return response()->json([
                'status' => 0,
            ]);
        }

        $channel->c_name = $request->input('c_name');
        $channel->category = $request->input('category');
        $channel->fans = $request->input('fans');
        $channel->views = $request->input('views');
        $channel->state = $request->input('state');
        if ($channel->save())
        {
            return response()->json([
                'status' => 1,
            ]);
        } else {
            return response()->json([
                'status' => 0,
            ]);
        }
    }
}
