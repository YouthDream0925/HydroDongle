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
        $name = $request->name ? $request->name : null;
        $models = PhoneModel::filter($request->all())->paginateFilter($per_page)->appends(['per_page' => $per_page, 'name' => $name]);
        return view('admin.editer.models.index', compact('models', 'per_page'))
            ->with('i', ($request->input('page', 1) - 1) * $per_page);
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
        $features = '';
        foreach($feature_ids as $key => $id) {
            if($key < count($feature_ids) - 1)
                $features = $features.$id.",";
            else
                $features = $features.$id;
        }
        return view('admin.editer.models.edit', compact('model', 'memories', 'brand', 'cpu', 'feature_ids', 'features'));
    }

    public function update(PhoneModelRequest $request, $id)
    {
        $model = PhoneModel::find($id);
        $model->name = $request->input('name');
        $model->link = $request->input('link');
        $model->note = $request->input('note');
        $model->brand_id = $request->input('brand_id');
        $model->cpu_id = $request->input('cpu_id');
        if($request->feature_id != null) {
            $new_feature_ids = '[';
            foreach(explode(',', $request->feature_id) as $key => $item) {
                if(count(explode(',', $request->feature_id)) != $key + 1)
                    $new_feature_ids = $new_feature_ids.$item.',';
                else
                    $new_feature_ids = $new_feature_ids.$item;
            }
            $new_feature_ids = $new_feature_ids.']';
            $model->feature_id = $new_feature_ids;
        } else {
            $model->feature_id = [];
        }

        if($request->activate == "true")
            $model->activate = '1';
        else
            $model->activate = '0';
        if($request->file('model_image') != null) {
            if($model->hasMedia('model_image')) {
                $media = $model->getMedia('model_image')->first();
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
            $cpus = Cpu::filter($request->all())->select('id', 'name', 'explanation')->get();
            $real_cpus = [];
            foreach($cpus as $item) {
                if(count($item->socs) != 0) {
                    if($item->hasMedia('cpu_image')) {
                        $item->image_url = $item->getMedia('cpu_image')->first()->getUrl();
                    } else {
                        $item->image_url = url('storage/sample/brand');
                    }
                    array_push($real_cpus, $item);
                }                    
            }
            $data = $real_cpus;
        } else if($type == 'feature') {
            $data = Feature::filter($request->all())->get();
        }

        $result = [
            'type' => $type,
            'data' => $data
        ];

        return $result;
    }

    public function socs(Request $request)
    {
        $result = [];
        $cpu = Cpu::find($request->cpu_id);
        if($cpu) {
            $result = [
                'success' => true,
                'socs' => $cpu->socs
            ];
        } else {
            $result = [
                'success' => false,
                'socs' => null
            ];
        }

        return $result;
    }
}
