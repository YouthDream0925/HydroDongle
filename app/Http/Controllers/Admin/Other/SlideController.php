<?php

namespace App\Http\Controllers\Admin\Other;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\SlideRequest;
use App\Http\Requests\Admin\BrandRequest;
use App\Models\Admin\Other\Slide;
use Plank\Mediable\Facades\ImageManipulator;
use Plank\Mediable\HandlesMediaUploadExceptions;
use Plank\Mediable\Facades\MediaUploader;

class SlideController extends Controller
{
    public function index(Request $request)
    {
        $slides = Slide::all();
        return view('admin.other.slides.index', compact('slides'));
    }

    public function create()
    {
        return view('admin.other.slides.create');
    }

    public function store(SlideRequest $request)
    {
        $input = $request->all();
        if($request->activate == "true")
            $input['activate'] = '1';
        else
            $input['activate'] = '0';
        $slide = Slide::create($input);

        try {
            if($request->hasfile('ads_images')) {
                foreach($request->file('ads_images') as $key => $file) {
                    $media[$key] = MediaUploader::fromSource($file)
                        ->toDisk('slides')
                        ->upload();
    
                    $slide->attachMedia([$media[$key]->getKey()], 'ads_images');
                }
            }
        } catch (MediaUploadException $e) {
            throw $this->transformMediaUploadException($e);
        }

        return redirect()->route('slides.index')
            ->with('success','Slide added successfully');
    }

    public function edit($id)
    {
        $slide = Slide::find($id);
        $remaining_number = 3 - count($slide->getMedia('ads_images'));
        return view('admin.other.slides.edit', compact('slide', 'remaining_number'));
    }

    public function update(SlideRequest $request, $id)
    {
        $slide = Slide::find($id);
        $slide->title = $request->input('title');
        $slide->description = $request->input('description');
        $slide->btn_text = $request->input('btn_text');
        $slide->btn_link = $request->input('btn_link');
        if($request->activate == "true")
            $slide->activate = '1';
        else
            $slide->activate = '0';

        if($request->hasfile('ads_images')) {
            foreach($request->file('ads_images') as $key => $file) {
                if($slide->hasMedia('ads_images')) {
                    $mediaItems = $slide->getMedia('ads_images');
                    if(count($mediaItems) > $key && $mediaItems[$key] != null) {
                        $mediaItems[$key]->delete();
                        $new_media[$key] = MediaUploader::fromSource($file)
                            ->toDisk('slides')
                            ->upload();
                        $slide->attachMedia($new_media[$key]->getKey(), 'ads_images');
                    } else {
                        $new_media[count($mediaItems)] = MediaUploader::fromSource($file)
                            ->toDisk('slides')
                            ->upload();
                        $slide->attachMedia($new_media[count($mediaItems)]->getKey(), 'ads_images');
                    }
                }
            }
            // die();
        }

        $slide->update();
        return redirect()->back()->with('success','Slide updated successfully');
    }

    public function destroy($id)
    {
        $slide = Slide::find($id);
        if($slide->hasMedia('ads_images')) {
            foreach($slide->getMedia('ads_images') as $key => $media)
                $media->delete();
        }
        $slide->delete();

        return redirect()->route('slides.index')
                        ->with('success','Slide deleted successfully');
    }

    public function ads_delete(Request $request)
    {
        $flag = false; $result = [];
        $slide = Slide::find($request->slide_key);
        if($slide->hasMedia('ads_images') && count($slide->getMedia('ads_images')) > 1) {
            foreach($slide->getMedia('ads_images') as $media) {
                if($media->getKey() == $request->media_key) {
                    $media->delete();
                    $flag = true;
                }
            }
            if($flag == true) {
                session(['success' => 'ADS deleted successfully.']);
            }
            else {
                session(['error' => 'Can not find this ADS.']);
            }
        } else {
            session(['error' => 'Can not delete this ADS.']);
        }
        return;
    }
}