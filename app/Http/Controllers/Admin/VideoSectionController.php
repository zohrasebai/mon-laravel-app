<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VideoSection;
use Illuminate\Support\Facades\File;

class VideoSectionController extends Controller
{
    // دالة عرض الصفحة (هذه كانت مفقودة)
    public function index()
    {
        $video = VideoSection::first() ?? new VideoSection();
        return view('admin.video.index', compact('video'));
    }

public function update(Request $request)
{
    $video = VideoSection::firstOrCreate([]);

    $video->title_fr = $request->title_fr;
    $video->text_fr = $request->text_fr;

    if ($request->hasFile('video_file')) {
        $file = $request->file('video_file');
        $name = time().'.'.$file->getClientOriginalExtension();

        $file->move(public_path('videos'), $name);

        $video->video_file = 'videos/'.$name;
    }

    $video->save();

    return back()->with('success', 'OK');
}
}