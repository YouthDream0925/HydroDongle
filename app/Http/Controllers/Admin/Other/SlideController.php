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
        $slides = Slide::orderBy('sort', 'asc')->get();
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
            if($request->hasfile('ads_image')) {
                $media = MediaUploader::fromSource($request->file('ads_image'))
                    ->toDisk('slides')
                        ->upload();

                $slide->attachMedia($media, 'ads_image');
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
        return view('admin.other.slides.edit', compact('slide'));
    }

    public function update(SlideRequest $request, $id)
    {
        $slide = Slide::find($id);
        $slide->title = $request->input('title');
        $slide->description = $request->input('description');
        $slide->sort = $request->input('sort');
        $slide->btn_text = $request->input('btn_text');
        $slide->btn_link = $request->input('btn_link');
        if($request->activate == "true")
            $slide->activate = '1';
        else
            $slide->activate = '0';

        if($request->file('ads_image') != null) {
            if($slide->hasMedia('ads_image')) {
                $media = $slide->getMedia('ads_image')->first();
                $media->delete();
            }

            $media = MediaUploader::fromSource($request->file('ads_image'))
                ->toDisk('slides')
                    ->upload();
            
            $slide->attachMedia($media, 'ads_image');
        }

        $slide->update();
        return redirect()->back()->with('success','Slide updated successfully');
    }

    public function destroy($id)
    {
        $slide = Slide::find($id);
        if($slide->hasMedia('ads_image')) {
            $media = $slide->getMedia('ads_image')->first();
            $media->delete();
        }
        $slide->delete();

        return redirect()->route('slides.index')
                        ->with('success','Slide deleted successfully');
    }
}