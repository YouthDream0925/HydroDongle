<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Admin\Other\Slide;
use App\Models\Admin\Editer\Brand;
use App\Models\Admin\Editer\Feature;
use App\Models\Admin\Editer\PhoneModel;
use App\Models\Role;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Suppo rt\Renderable
     */
    public function index()
    {
        $main_banner = Slide::where('activate', '1')->orderBy('sort', 'asc')->first();
        $brands = Brand::orderBy('updated_at', 'desc')->where('brand_activate', '1')->select('brand_id', 'brand_name')->get();
        $real_brands = [];
        foreach($brands as $brand) {
            if(count($brand->models) != 0)
                array_push($real_brands, $brand);
        }
        $models = PhoneModel::orderBy('updated_at', 'desc')->where('activate', '1')->take(10)->get();
        return view('front.home', compact('main_banner', 'real_brands', 'models'));
    }

    public function models(Request $request)
    {
        $result = [];
        $brand = Brand::find($request->id);
        if($brand != null) {
            foreach($brand->models_filter as $model) {
                if($model->hasMedia('model_image')) {
                    $model->image = $model->getMedia('model_image')->first()->getUrl();
                } else {
                    $model->image = '/storage/sample/brand';
                }
            }
            $result = [
                'success' => true,
                'models' => $brand->models_filter
            ];
        } else {
            $result = [
                'success' => false,
                'models' => null
            ];
        }
        return $result;
    }
}