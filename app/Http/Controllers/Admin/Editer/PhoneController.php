<?php

namespace App\Http\Controllers\Admin\Editer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PhoneController extends Controller
{
    public function index()
    {
        return view('admin.editer.phones.index');
    }
}
