<?php

namespace App\Http\Controllers\Admin\Editer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HelpController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.editer.helps.index');
    }

    public function create()
    {
        return view('admin.editer.helps.create');
    }
}
