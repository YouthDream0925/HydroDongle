<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Mail;

class ContactController extends Controller
{
    public function index()
    {
        $super_admin = Admin::whereHas(
            'roles', function($q){
                $q->where('name', 'SuperAdmin');
            }
        )->first();

        return view('front.contact.index', compact('super_admin'));
    }

    public function send()
    {
        $user = Auth::user();

        $data["email"] = "youthdream0925@gmail.com";
        $data["title"] = "TEST";
        $data["body"] = "TEST";

        Mail::send('front.contact.mail', $data, function($message) use ($data) {
            $message->to($data["email"], $data["email"])
                    ->subject($data["title"]);
        });

        return redirect()->route('contact')->with('success', "Success");
    }
}
