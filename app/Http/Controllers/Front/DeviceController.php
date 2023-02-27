<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Editer\Brand;
use App\Models\Admin\Editer\PhoneModel;
use App\Models\Admin\Editer\Feature;

class DeviceController extends Controller
{
    public function index(Request $request)
    {
        $brands = Brand::filter($request->all())->where('brand_activate', '1')->paginateFilter(16);
        $artilces = '';
        if ($request->ajax()) {
            foreach ($brands as $brand) {
                $artilces .= view('front.devices.brand_temp', compact('brand'))->render();
            }
            return $artilces;
        }
        return view('front.devices.index', compact('brands'));
    }

    public function brand(Request $request, $id)
    {
        $brand = Brand::find($id);
        $models = PhoneModel::filter($request->all())->where('brand_id', $id)->where('activate', '1')->get();
        return view('front.devices.brand', compact('brand', 'models'));
    }

    public function model($id)
    {
        $model = PhoneModel::find($id);
        $features = [];
        $feature_ids = json_decode($model->feature_id, TRUE);
        foreach($feature_ids as $id) {
            $feature = Feature::find($id);
            array_push($features, $feature);
        }
        return view('front.devices.model', compact('model', 'features'));
    }
}
