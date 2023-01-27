<?php

namespace App\Http\Controllers\Admin\Editer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Editer\Brand;

class BrandController extends Controller
{
    public function index(Request $request) {
        $per_page = $request->per_page ? $request->per_page : config('pagination.per_page');
        $brands = Brand::Popular($request->per_page);

        return view('admin.brands.index', compact('brands'));
    }
}
