<?php

namespace App\Http\Controllers\Admin\Editer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ModelController extends Controller
{
    public function index()
    {
        return view('admin.editer.models.index');
    }

    public function create()
    {
        return view('admin.editer.models.create');
    }
}
