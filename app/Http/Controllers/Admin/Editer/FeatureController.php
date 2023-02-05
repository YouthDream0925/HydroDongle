<?php

namespace App\Http\Controllers\Admin\Editer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Editer\Feature;
use App\Http\Requests\Admin\FeatureRequest;
use Plank\Mediable\Facades\ImageManipulator;
use Plank\Mediable\HandlesMediaUploadExceptions;
use Plank\Mediable\Facades\MediaUploader;

class FeatureController extends Controller
{
    public function index(Request $request)
    {
        $per_page = $request->per_page ? $request->per_page : config('pagination.per_page');
        $features = Feature::Popular($per_page);
        return view('admin.editer.features.index', compact('features'))
            ->with('i', ($request->input('page', 1) - 1) * $per_page);
    }

    public function create()
    {
        return view('admin.editer.features.create');
    }

    public function store(FeatureRequest $request)
    {
        $input = $request->all();
        if($request->activate == true)
            $input['activate'] = '1';
        else
            $input['activate'] = '0';
        $feature = Feature::create($input);

        try {
            if($request->file('icon') != null) {
                $media = MediaUploader::fromSource($request->file('icon'))
                    ->toDisk('features')
                        ->upload();
                    
                $feature->attachMedia($media, 'icon');
            }
        } catch (MediaUploadException $e) {
            throw $this->transformMediaUploadException($e);
        }

        return redirect()->route('features.index')->with('success', 'Feature created successfully');
    }

    public function edit($id)
    {
        $feature = Feature::find($id);
        return view('admin.editer.features.edit', compact('feature'));
    }

    public function update(FeatureRequest $request, $id)
    {
        $feature = Feature::find($id);
        $feature->name = $request->input('name');
        $feature->sorting = $request->input('sorting');
        if($request->activate == "true")
            $feature->activate = '1';
        else
            $feature->activate = '0';
        if($request->file('icon') != null) {
            if($feature->hasMedia('icon')) {
                $media = $feature->getMedia('icon')->first();
                $media->delete();
            }

            $media = MediaUploader::fromSource($request->file('icon'))
                ->toDisk('features')
                    ->upload();
            
            $feature->attachMedia($media, 'icon');
        }

        $feature->update();
        return redirect()->back()->with('success','Feature updated successfully');
    }
}
