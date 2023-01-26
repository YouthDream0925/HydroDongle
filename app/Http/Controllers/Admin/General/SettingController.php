<?php

namespace App\Http\Controllers\Admin\General;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\General\Setting;

class SettingController extends Controller
{
    public function index() {
        $settings = Setting::all();
        return view('admin.general.setting', compact('settings'));
    }

    public function edit(Request $request) {
        $data = [];
        $settings = Setting::all();
        foreach($settings as $setting)
            $setting->delete();

        foreach($request->input() as $key => $value)
            if($key != "_token") {
                Setting::create([
                    'property' => $key,
                    'value' => $value
                ]);
            }
        return redirect()->back()->with('success', 'Hello, This is succeed.');
    }
}
