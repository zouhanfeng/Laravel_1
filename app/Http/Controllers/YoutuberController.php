<?php

namespace App\Http\Controllers;


use App\Models\youtuber;
use App\Models\channel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CreateYoutuberRequest;

class YoutuberController extends Controller
{
    function index()
    {
        $youtubers = youtuber::all();
        $countries = youtuber::allcountries()->get();
        $data = [];
        foreach ($countries as $country)
        {
            $data["$country->country"] = $country->country;
        }
        return view('youtuber.index',['youtubers'=>$youtubers,'countries'=>$data]);
    }
    function creat()
    {
        $channels = DB::table('channels')
            ->select('channels.id', 'channels.c_name')
            ->orderBy('channels.id', 'asc')
            ->get();

        $data = [];
        foreach ($channels as $channel)
        {
            $data[$channel->id] = $channel->c_name;
        }
        return view('youtuber.creat', ['channels' =>$data]);
    }

    function edit($id)
    {
        $channels = DB::table('channels')
            ->select('channels.id', 'channels.c_name')
            ->orderBy('channels.id', 'asc')
            ->get();

        $data = [];
        foreach ($channels as $channel)
        {
            $data[$channel->id] = $channel->c_name;
        }

        $youtuber =youtuber::findorfail($id);


        return view('youtuber.edit',['youtuber'=>$youtuber,'channels' =>$data]);
    }
    function show($id)
    {
        $youtuber = youtuber::findOrFail($id);
        $channel = channel::findOrFail($youtuber->c_id);

        return view('youtuber.show', ['youtuber' => $youtuber, 'channel_name' => $channel->c_name]);
    }

    public function destroy($id)
    {
        $player = youtuber::findOrFail($id);
        $player->delete();
        return redirect('youtubers');
    }
  /*public function senior()
    {
        $youtubers = youtuber::senior()->get();
       $countries = youtuber::allcountries()->get();
        $data = [];
        foreach ($countries as $country)
        {
            $data["$country->country"] = $country->country;
        }
        return view('youtubers.index', ['youtubers' => $youtubers, 'countries'=>$data]);
    }*/
    public function country(Request $request)
    {
        $youtubers = youtuber::country($request->input('cou'))->get();

        $countries = youtuber::allcountries()->get();
        $data = [];
        foreach ($countries as $country)
        {
            $data["$country->country"] = $country->country;
        }
        return view('youtuber.index', ['youtubers' => $youtubers, 'countries'=>$data]);
    }
    public function store(CreateYoutuberRequest $request)
    {
        $yt_name = $request->input('yt_name');
        $c_id = $request->input('c_id');
        $country = $request->input('country');
        $year = $request->input('year');
        $education = $request->input('education');

        $youtuber = youtuber::create([
            'yt_name'=>$yt_name,
            'c_id'=>$c_id,
            'country'=>$country,
            'year'=>$year,
            'education'=>$education]);
        return redirect('youtubers');
    }
    public function update($id, CreateYoutuberRequest $request)
    {
        $youtuber = youtuber::findOrFail($id);

        $youtuber->yt_name = $request->input('yt_name');
        $youtuber->c_id = $request->input('c_id');
        $youtuber->country = $request->input('country');
        $youtuber->year = $request->input('year');
        $youtuber->education = $request->input('education');
        $youtuber->save();

        return redirect('youtubers');
    }
    public function api_delete(Request $request)
    {
        $youtuber = youtuber::find($request->input('id'));

        if ($youtuber == null)
        {
            return response()->json([
                'status' => 0,
            ]);
        }

        if ($youtuber->delete())
        {
            return response()->json([
                'status' => 1,
            ]);
        }
    }
    public function api_players()
    {
        return Player::all();
    }


    public function api_update(Request $request)
    {
        $youtuber = youtuber::find($request->input('id'));
        if ($youtuber == null)
        {
            return response()->json([
                'status' => 0,
            ]);
        }
        $youtuber->yt_name = $request->input('yt_name');
        $youtuber->c_id = $request->input('c_id');
        $youtuber->country = $request->input('country');
        $youtuber->onboarddate = $request->input('onboarddate');
        $youtuber->year = $request->input('year');
        $youtuber->education = $request->input('education');

        if ($youtuber->save())
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
