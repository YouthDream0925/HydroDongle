<?php

namespace App\Http\Controllers\Admin\Editer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Editer\Brand;
use App\Http\Requests\Admin\BrandRequest;
use Plank\Mediable\Facades\ImageManipulator;
use Plank\Mediable\HandlesMediaUploadExceptions;
use Plank\Mediable\Facades\MediaUploader;

class BrandController extends Controller
{
    public function index(Request $request) {
        $per_page = $request->per_page ? $request->per_page : config('pagination.per_page');
        $name = $request->name ? $request->name : null;
        $brands = Brand::filter($request->all())->paginateFilter($per_page)->appends(['per_page' => $per_page, 'name' => $name]);
        return view('admin.editer.brands.index', compact('brands', 'per_page'))
            ->with('i', ($request->input('page', 1) - 1) * $per_page);
    }

    public function create()
    {
        return view('admin.editer.brands.create');
    }

    public function store(BrandRequest $request)
    {
        $input = $request->all();
        if($request->brand_activate == "true")
            $input['brand_activate'] = '1';
        else
            $input['brand_activate'] = '0';
        $brand = Brand::create($input);

        try {
            if($request->file('brand_image') != null) {
                $media = MediaUploader::fromSource($request->file('brand_image'))
                    ->toDisk('brands')
                    ->upload();
                    
                $brand->attachMedia($media, 'brand_image');
            }
        } catch (MediaUploadException $e) {
            throw $this->transformMediaUploadException($e);
        }

        return redirect()->route('brands.index')->with('success', 'Brand created successfully');
    }

    public function show($id)
    {
        echo json_encode('show');
        die();
    }

    public function edit($id)
    {
        $brand = Brand::find($id);
        return view('admin.editer.brands.edit', compact('brand'));
    }

    public function update(BrandRequest $request, $id)
    {
        $brand = Brand::find($id);
        $brand->brand_name = $request->input('brand_name');
        $brand->brand_link = $request->input('brand_link');
        $brand->brand_order = $request->input('brand_order');
        if($request->brand_activate == "true")
            $brand->brand_activate = '1';
        else
            $brand->brand_activate = '0';
        if($request->file('brand_image') != null) {
            if($brand->hasMedia('brand_image')) {
                $media = $brand->getMedia('brand_image')->first();
                $media->delete();
            }

            $media = MediaUploader::fromSource($request->file('brand_image'))
            ->toDisk('brands')
            ->upload();
            
            $brand->attachMedia($media, 'brand_image');
        }

        $brand->update();
        return redirect()->back()->with('success','Brand updated successfully');
    }

    public function destroy($id)
    {
        $brand = Brand::find($id);
        if($brand->hasMedia('brand_image')) {
            $media = $brand->getMedia('brand_image')->first();
            $media->delete();
        }

        foreach($brand->models as $model) {
            if($model->hasMedia('model_image')) {
                $media = $model->getMedia('model_image')->first();
                $media->delete();
            }
            $model->delete();
        }

        foreach($brand->drivers as $driver) {
            $driver->delete();
        }

        foreach($brand->helps as $help) {
            $help->delete();
        }
        
        $brand->delete();

        return redirect()->route('brands.index')
                        ->with('success','Brand deleted successfully');
    }
}
