<?php

namespace App\Http\Controllers\Admin\Other;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Other\Guide;

class GuideController extends Controller
{
    public function index()
    {
        $guide = Guide::first();
        return view('admin.other.guide.index', compact('guide'));
    }

    public function save(Request $request)
    {
        $input = $request->all();
        $guides = Guide::all();
        if($guides != null) {
            foreach($guides as $guide)
                $guide->delete();
        }
        Guide::create($input);
        $result = [
            'success' => true,
            'msg' => 'Saved successfully.'
        ];
        return $result;
    }
}
