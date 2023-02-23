<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $super_admin = Admin::whereHas(
            'roles', function($q){
                $q->where('name', 'SuperAdmin');
            }
        )->first();

        return view('front.contact', compact('super_admin'));
    }
}
