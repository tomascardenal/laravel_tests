<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVideoRequest;
use App\Jobs\ConvertVideoForDownloading;
use App\Jobs\ConvertVideoForStreaming;
use Illuminate\Http\Request;
use App\Video;
use Illuminate\Support\Str;

class VideoController extends Controller
{
    public function index()
    {
        $videos = Video::orderBy('created_at', 'DESC')->get();
        return view('videos')->with('videos', $videos);
    }

    public function uploader()
    {
        return view('video.uploader');
    }

    public function store(StoreVideoRequest $request)
    {
        $path = Str::random(16) . '.' . $request->video->getClientOriginalExtension();
        $request->video->storeAs('public', $path);

        $video = Video::create([
            'disk' => 'public',
            'original_name' => $request->video->getClientOriginalName(),
            'path' => $path,
            'title' => $request->title,
        ]);
        ConvertVideoForStreaming::dispatch($video);
        return redirect('videos')
            ->with('message','Your video will be available shortly after we process it');
        /*$video = Video::create([
            'disk' => 'videos_disk',
            'original_name' => $request->video->getClientOriginalName(),
            'path' => $request->video->store('videos', 'videos_disk'),
            'title' => $request->title,
        ]);
        $this->dispatch(new ConvertVideoForDownloading($video));
        $this->dispatch(new ConvertVideoForStreaming($video));

        return response()->json(['id' => $video->id,], 201);*/
    }
}
