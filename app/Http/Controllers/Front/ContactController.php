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

    public function send()
    {
        $testMailData = [
            'title' => 'Test Email From AllPHPTricks.com',
            'body' => 'This is the body of test email.'
        ];

        Mail::to('youthdream0925@gmail.com')->send(new SendMail($testMailData));

        return redirect()->route('contact')->with('success', "Success");
    }
}
