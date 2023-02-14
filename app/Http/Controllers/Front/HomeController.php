<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Admin\Other\Slide;
use App\Models\Admin\Editer\Brand;
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
        $brands = Brand::orderBy('updated_at', 'desc')->where('brand_activate', '1')->take(10)->get();
        return view('front.home', compact('main_banner', 'brands'));
    }
}