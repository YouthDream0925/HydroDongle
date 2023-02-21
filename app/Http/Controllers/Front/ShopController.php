<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Editer\Product;

class ShopController extends Controller
{
    public function index()
    {
        $produts = Product::where('activate', '1')->orderBy('updated_at', 'desc')->get();
        return view('front.shop.index', compact('produts'));
    }

    public function detail($id)
    {
        $product = Product::find($id);
        return view('front.shop.detail', compact('product'));
    }
}
