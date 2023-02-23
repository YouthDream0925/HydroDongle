<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Editer\Brand;

class DeviceController extends Controller
{
    public function index(Request $request)
    {
        $brands = Brand::filter($request->all())->paginateFilter(16);
        $artilces = '';
        if ($request->ajax()) {
            foreach ($brands as $brand) {
                $artilces .= view('front.devices.brands', compact('brand'))->render();
            }
            return $artilces;
        }
        return view('front.devices.index', compact('brands'));
    } 
}
