<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Editer\Product;
use App\Models\Admin\Editer\Help;
use App\Models\Admin\Editer\Faq;

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

    public function help(Request $request)
    {
        $helps_dropdown = Help::filter($request->all())->where('view_type', '0')->get();
        $helps_page = Help::filter($request->all())->where('view_type', '1')->get();
        $faqs = Faq::filter($request->all())->get();
        return view('front.shop.help.index', compact('helps_dropdown', 'helps_page', 'faqs'));
    }

    public function help_detail($id)
    {
        $selected_help = $id;
        $helps_page = Help::where('view_type', '1')->get();
        return view('front.shop.help.detail', compact('helps_page', 'selected_help'));
    }
}
