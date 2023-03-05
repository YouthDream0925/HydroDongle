<?php

namespace App\Http\Controllers\Admin\Editer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Editer\Product;
use App\Http\Requests\Admin\ProductRequest;
use Plank\Mediable\Facades\ImageManipulator;
use Plank\Mediable\HandlesMediaUploadExceptions;
use Plank\Mediable\Facades\MediaUploader;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $per_page = $request->per_page ? $request->per_page : config('pagination.per_page');
        $name = $request->name ? $request->name : null;
        $products = Product::filter($request->all())->paginateFilter($per_page)->appends(['per_page' => $per_page, 'name' => $name]);
        return view('admin.editer.products.index', compact('products', 'per_page'))
            ->with('i', ($request->input('page', 1) - 1) * $per_page);
    }

    public function create()
    {
        return view('admin.editer.products.create');
    }

    public function store(ProductRequest $request)
    {
        $input = $request->all();
        if($request->activate == "true")
            $input['activate'] = '1';
        else
            $input['activate'] = '0';

        if($request->type == "true") {
            // if type = 1, this product is ProPack
            $input['type'] = '1';
            $input['period'] = 0;
        }
        else {
            // if type = 0, this product in License
            $input['type'] = '0';
            if($request->period != null) {
                $input['period'] = $request->period;
            } else {
                return redirect()->back()->with('error', 'Please select period of License.');
            }
        }
        $product = Product::create($input);

        try {
            if($request->file('product_image') != null) {
                $media = MediaUploader::fromSource($request->file('product_image'))
                    ->toDisk('products')
                        ->upload();
                    
                $product->attachMedia($media, 'product_image');
            }
        } catch (MediaUploadException $e) {
            throw $this->transformMediaUploadException($e);
        }

        return redirect()->route('products.index')->with('success', 'Product created successfully');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        return view('admin.editer.products.edit', compact('product'));
    }

    public function update(ProductRequest $request, $id)
    {
        $product = Product::find($id);
        $input = $request->all();
        if($request->activate == "true")
            $input['activate'] = '1';
        else
            $input['activate'] = '0';

        if($request->type == "true") {
            // if type = 1, this product is ProPack
            $input['type'] = '1';
            $input['period'] = 0;
        }
        else {
            // if type = 0, this product in License
            $input['type'] = '0';
            if($request->period != null) {
                $input['period'] = $request->period;
            } else {
                return redirect()->back()->with('error', 'Please select period of License.');
            }            
        }
            
        if($request->file('product_image') != null) {
            if($product->hasMedia('product_image')) {
                $media = $product->getMedia('product_image')->first();
                $media->delete();
            }

            $media = MediaUploader::fromSource($request->file('product_image'))
                ->toDisk('products')
                    ->upload();
            
            $product->attachMedia($media, 'product_image');
        }

        $product->update($input);
        return redirect()->back()->with('success','Product updated successfully');
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        if($product->hasMedia('product_image')) {
            $media = $product->getMedia('product_image')->first();
            $media->delete();
        }

        $product->delete();

        return redirect()->route('products.index')
                        ->with('success','Product deleted successfully');
    }
}
