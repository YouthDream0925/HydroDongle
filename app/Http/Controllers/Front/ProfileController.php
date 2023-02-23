<?php

namespace App\Http\Controllers\Front;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Plank\Mediable\Facades\ImageManipulator;
use Plank\Mediable\HandlesMediaUploadExceptions;
use Plank\Mediable\Facades\MediaUploader;

class ProfileController extends Controller
{
    public function index($id)
    {
        $user = Auth::user();
        return view('front.profile', compact('user'));
    }

    public function update(Request $request)
    {
        // echo json_encode($reqeust->all());
        // die();

        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
        ]);

        $user = Auth::user();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->phone = $request->phone;
        $user->update();

        try {
            if($request->file('user_avatar') != null) {
                if($user->hasMedia('user_avatar')) {
                    $media = $user->getMedia('user_avatar')->first();
                    $media->delete();
                }
    
                $media = MediaUploader::fromSource($request->file('user_avatar'))
                    ->toDisk('avatars')
                        ->upload();
                
                $user->attachMedia($media, 'user_avatar');
            }
        } catch (MediaUploadException $e) {
            throw $this->transformMediaUploadException($e);
        }

        return redirect()->back()->with('success', 'Your info is updated successfully.');
    }
}
