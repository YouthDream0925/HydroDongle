<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Mail;
use App\Mail\SendMail;

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

    public function send(Request $request)
    {
        $name = $request->name;
        $email = $request->email;
        $content = $request->content;
        
        $mailData = [
            'title' => 'Mail from HydraDongle.com',
            'url' => 'https://hydradongle.com',
            'name' => $name,
            'email' => $email,
            'content' => $content
        ];
         
        Mail::to('youthdream0925@gmail.com')->send(new SendMail($mailData));
         
        return redirect()->route('contact')->with('success', "Success");
    }
}
