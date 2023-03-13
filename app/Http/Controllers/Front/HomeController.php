<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Admin\Other\Slide;
use App\Models\Admin\Editer\Brand;
use App\Models\Admin\Editer\Feature;
use App\Models\Admin\Editer\PhoneModel;
use App\Models\Admin\Editer\Cpu;
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
            if($brand->isModel() > 0)
                array_push($real_brands, $brand);
        }
        $models = PhoneModel::orderBy('updated_at', 'desc')->where('activate', '1')->take(5)->get();
        return view('front.home', compact('main_banner', 'real_brands', 'models'));
    }

    public function models(Request $request)
    {
        $result = [];
        $brand = Brand::find($request->id);
        $data = [];
        if($brand != null) {
            foreach($brand->models_filter as $model) {
                $temp['id'] = $model->id;
                $temp['name'] = $model->name;
                if($model->hasMedia('model_image')) {
                    $temp['image'] = $model->getMedia('model_image')->first()->getUrl();
                } else {
                    $temp['image'] = '/storage/sample/brand';
                }

                $temp['cpu_id'] = $model->cpu_id;
                $cpu = Cpu::find($model->cpu_id);
                if($cpu != null) {
                    $temp['cpu_name'] = $cpu->name;
                } else {
                    $temp['cpu_name'] = 'No CPU';
                }
                if($cpu->hasMedia('cpu_image')) {
                    $temp['cpu_image'] = $cpu->getMedia('cpu_image')->first()->getUrl();
                } else {
                    $temp['cpu_image'] = '/storage/sample/brand';
                }
                array_push($data, $temp);
            }
            $result = [
                'success' => true,
                'models' => $data
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