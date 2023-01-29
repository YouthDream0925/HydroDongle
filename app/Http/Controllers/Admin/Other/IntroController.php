<?php

namespace App\Http\Controllers\Admin\Other;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Other\Intro;

class IntroController extends Controller
{
    public function index()
    {
        $intro = Intro::first();
        return view('admin.other.introduction.index', compact('intro'));
    }

    public function save(Request $request)
    {
        $input = $request->all();
        $intros = Intro::all();
        if($intros != null) {
            foreach($intros as $intro)
                $intro->delete();
        }
        Intro::create($input);
        $result = [
            'success' => true,
            'msg' => 'Saved successfully.'
        ];
        return $result;
    }
}
