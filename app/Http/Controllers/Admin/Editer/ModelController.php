<?php

namespace App\Http\Controllers\Admin\Editer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Editer\PhoneModel;
use App\Models\Admin\Editer\Brand;
use App\Models\Admin\Editer\Cpu;
use App\Models\Admin\Editer\Feature;
use App\Http\Requests\Admin\PhoneModelRequest;
use Plank\Mediable\Facades\ImageManipulator;
use Plank\Mediable\HandlesMediaUploadExceptions;
use Plank\Mediable\Facades\MediaUploader;

class ModelController extends Controller
{
    public function index()
    {
        return view('admin.editer.models.index');
    }

    public function create(Request $request)
    {
        $brands = Brand::get();
        return view('admin.editer.models.create', compact('brands'));
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
