<?php

namespace App\Http\Controllers\Admin\Editer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Editer\Feature;
use App\Models\Admin\Editer\PhoneModel;
use App\Http\Requests\Admin\FeatureRequest;
use Plank\Mediable\Facades\ImageManipulator;
use Plank\Mediable\HandlesMediaUploadExceptions;
use Plank\Mediable\Facades\MediaUploader;

class FeatureController extends Controller
{
    public function index(Request $request)
    {
        $per_page = $request->per_page ? $request->per_page : config('pagination.per_page');
        $name = $request->name ? $request->name : null;
        $features = Feature::filter($request->all())->paginateFilter($per_page)->appends(['per_page' => $per_page, 'name' => $name]);
        return view('admin.editer.features.index', compact('features', 'per_page'))
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
        $feature->explanation = $request->input('explanation');
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

    public function destroy($id)
    {
        $feature = Feature::find($id);
        if($feature->hasMedia('icon')) {
            $media = $feature->getMedia('icon')->first();
            $media->delete();
        }
        $feature->delete();

        $models = PhoneModel::get();
        foreach($models as $model) {
            $feature_ids = json_decode($model->feature_id, TRUE);
            foreach ($feature_ids as $key => $feature_id) {
                if($id == $feature_id) {
                    unset($feature_ids[$key]);
                }
            }

            $i = 0;
            $input = '[';
            foreach($feature_ids as $item) {
                if($i < count($feature_ids) - 1)
                    $input .= $item.',';
                else
                    $input .= $item;
                $i++;
            }
            $input .= ']';

            $model->feature_id = $input;
            $model->save();
        }

        return redirect()->route('features.index')
                        ->with('success','Feature deleted successfully');
    }
}
