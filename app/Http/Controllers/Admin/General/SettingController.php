<?php

namespace App\Http\Controllers\Admin\General;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\General\Setting;
use Plank\Mediable\Facades\ImageManipulator;
use Plank\Mediable\HandlesMediaUploadExceptions;
use Plank\Mediable\Facades\MediaUploader;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index() {
        $settings = Setting::all();
        return view('admin.general.setting', compact('settings'));
    }

    public function store(Request $request) {
        $settings = Setting::all();
        $old_logo = null;
        foreach($settings as $setting) {
            if($setting->property != 'logo')
                $setting->delete();
            else
                $old_logo = $setting;
        }

        foreach($request->input() as $key => $value) 
            if($key != "_token") {
                Setting::create([
                    'property' => $key,
                    'value' => $value
                ]);
            }

        try {
            if($request->file('logo') != null) {
                $old_logo->delete();
                
                File::deleteDirectory(storage_path('app/logo'));
                $original_file_name = $request->file('logo')->getClientOriginalName();
                $uploaded_file = $request->file('logo')->storeAs('logo', $original_file_name);

                Setting::create([
                    'property' => 'logo',
                    'value' => $original_file_name
                ]);
            }
        } catch (MediaUploadException $e) {
            throw $this->transformMediaUploadException($e);
        }

        return redirect()->back()->with('success', trans('global.seetingsSaveSucceed'));
    }
}
