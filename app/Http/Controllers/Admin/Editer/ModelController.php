<?php

namespace App\Http\Controllers\Admin\Editer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Editer\PhoneModel;
use App\Models\Admin\Editer\Brand;
use App\Models\Admin\Editer\Cpu;
use App\Models\Admin\Editer\Feature;
use App\Models\Admin\Editer\Memory;
use App\Http\Requests\Admin\PhoneModelRequest;
use Plank\Mediable\Facades\ImageManipulator;
use Plank\Mediable\HandlesMediaUploadExceptions;
use Plank\Mediable\Facades\MediaUploader;

class ModelController extends Controller
{
    public function index(Request $request)
    {
        $per_page = $request->per_page ? $request->per_page : config('pagination.per_page');
        $models = PhoneModel::Popular($request->per_page);
        return view('admin.editer.models.index', compact('models'));
    }

    public function create(Request $request)
    {
        $memories = Memory::get();
        return view('admin.editer.models.create', compact('memories'));
    }

    public function store(PhoneModelRequest $request)
    {
        $input = $request->all();
        $input['feature_id'] = '[';
        foreach(explode(',', $request->feature_id) as $key => $item) {
            if(count(explode(',', $request->feature_id)) != $key + 1)
                $input['feature_id'] = $input['feature_id'].$item.',';
            else
                $input['feature_id'] = $input['feature_id'].$item;
        }
        $input['feature_id'] = $input['feature_id'].']';

        if($request->activate == "true")
            $input['activate'] = '1';
        else
            $input['activate'] = '0';
        $phone_model = PhoneModel::create($input);

        try {
            if($request->file('model_image') != null) {
                $media = MediaUploader::fromSource($request->file('model_image'))
                    ->toDisk('models')
                        ->upload();
                    
                $phone_model->attachMedia($media, 'model_image');
            }
        } catch (MediaUploadException $e) {
            throw $this->transformMediaUploadException($e);
        }

        return redirect()->route('models.index')->with('success', 'Model created successfully');
    }

    public function edit($id)
    {
        $model = PhoneModel::find($id);
        $brand = Brand::find($model->brand_id);
        $cpu = Cpu::find($model->cpu_id);
        $memories = Memory::get();
        $feature_ids = json_decode($model->feature_id, TRUE);
        return view('admin.editer.models.edit', compact('model', 'memories', 'brand', 'cpu', 'feature_ids'));
    }

    public function update(PhoneModelRequest $request, $id)
    {
        $model = PhoneModel::find($id);
        $model->name = $request->input('name');
        $model->link = $request->input('link');
        $model->note = $request->input('note');
        $model->brand_id = $request->input('brand_id');
        $model->cpu_id = $request->input('cpu_id');
        $new_feature_ids = '[';
        foreach(explode(',', $request->feature_id) as $key => $item) {
            if(count(explode(',', $request->feature_id)) != $key + 1)
                $new_feature_ids = $new_feature_ids.$item.',';
            else
                $new_feature_ids = $new_feature_ids.$item;
        }
        $new_feature_ids = $new_feature_ids.']';
        $model->feature_id = $new_feature_ids;

        if($request->activate == "true")
            $model->activate = '1';
        else
            $model->activate = '0';
        if($request->file('model_image') != null) {
            if($brand->hasMedia('model_image')) {
                $media = $brand->getMedia('model_image')->first();
                $media->delete();
            }

            $media = MediaUploader::fromSource($request->file('model_image'))
                ->toDisk('models')
                    ->upload();
            
            $model->attachMedia($media, 'model_image');
        }

        $model->update();
        return redirect()->back()->with('success','Model updated successfully');
    }

    public function destroy($id)
    {
        $model = PhoneModel::find($id);
        if($model->hasMedia('model_image')) {
            $media = $model->getMedia('model_image')->first();
            $media->delete();
        }
        $model->delete();

        return redirect()->route('models.index')
                        ->with('success','Model deleted successfully');
    }

    public function data(Request $request)
    {
        $result = []; $data = null;
        $type = $request->type;

        if($type == 'brand') {
            $data = Brand::filter($request->all())->select('brand_id', 'brand_name', 'brand_link')->get();
            foreach($data as $item) {
                if($item->hasMedia('brand_image')) {
                    $item->image_url = $item->getMedia('brand_image')->first()->getUrl();
                } else {
                    $item->image_url = url('storage/sample/brand');
                }
            }
        } else if($type == 'cpu') {
            $data = Cpu::filter($request->all())->select('id', 'name', 'explanation')->get();
            foreach($data as $item) {
                if($item->hasMedia('cpu_image')) {
                    $item->image_url = $item->getMedia('cpu_image')->first()->getUrl();
                } else {
                    $item->image_url = url('storage/sample/brand');
                }
            }
        } else if($type == 'feature') {
            $data = Feature::filter($request->all())->get();
        }

        $result = [
            'type' => $type,
            'data' => $data
        ];

        return $result;
    }
}
