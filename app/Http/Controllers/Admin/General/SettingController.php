<?php

namespace App\Http\Controllers\Admin\General;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\General\Setting;
use App\Models\Admin\General\CreditSetting;
use Plank\Mediable\Facades\ImageManipulator;
use Plank\Mediable\HandlesMediaUploadExceptions;
use Plank\Mediable\Facades\MediaUploader;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Models\Admin\History\Update;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::all();
        return view('admin.general.setting', compact('settings'));
    }

    public function store(Request $request)
    {
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
                if($old_logo != null)
                    $old_logo->delete();
                
                File::deleteDirectory(storage_path('app/public/logo'));
                $original_file_name = $request->file('logo')->getClientOriginalName();
                $uploaded_file = $request->file('logo')->storeAs('public/logo', $original_file_name);

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

    public function credit()
    {
        $credit_settings = CreditSetting::all();
        return view('admin.general.credit_setting', compact('credit_settings'));
    }

    public function credit_store(Request $request)
    {
        $this->validate($request, [
            'credit_amount_to_active_user_six_month' => 'required|numeric|max:99999',
            'credit_amount_to_active_user_twelve_month' => 'required|numeric|max:99999',
            'credit_amount_to_active_dongle_user' => 'required|numeric|max:99999',
            'user_max_credit_amount' => 'required|numeric|max:99999'
        ]);

        $credit_settings = CreditSetting::all();
        foreach($credit_settings as $credit_setting)
            $credit_setting->delete();

        foreach($request->input() as $key => $value) {
            if($key != "_token") {
                CreditSetting::create([
                    'type' => $key,
                    'value' => $value
                ]);
            }
        }

        return redirect()->back()->with('success', trans('global.seetingsSaveSucceed'));
    }

    public function download()
    {
        $settings = Setting::all();
        $update_histories = Update::orderBy('date', 'desc')->where('activate', '1')->get();

        $logo = null; $release_date = null; $size = null; $architecture = null; $md5 = null; $platform = null;
        $download_exe = null; $external_link = null; $zip_link = null; $app_name = null; $app_version = null;

        foreach($settings as $setting) {
            if($setting->property == 'logo')
                $logo = $setting->value;
            if($setting->property == 'app_version')
                $app_version = $setting->value;
            if($setting->property == 'app_name')
                $app_name = $setting->value;
            else if($setting->property == 'release_date')
                $release_date = $setting->value;
            else if($setting->property == 'size')
                $size = $setting->value;
            else if($setting->property == 'architecture')
                $architecture = $setting->value;
            else if($setting->property == 'md5')
                $md5 = $setting->value;
            else if($setting->property == 'platform')
                $platform = $setting->value;
            else if($setting->property == 'download_exe')
                $download_exe = $setting->value;
            else if($setting->property == 'download_link')
                $download_link = $setting->value;
            else if($setting->property == 'download_zip')
                $download_zip = $setting->value;
        }

        return view('front.download', compact('app_name', 'app_version', 'release_date', 'size', 'architecture', 'md5', 'platform', 'update_histories', 'download_exe', 'download_link', 'download_zip'));
    }
}
