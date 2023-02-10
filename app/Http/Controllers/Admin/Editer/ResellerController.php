<?php

namespace App\Http\Controllers\Admin\Editer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\ResellerRequest;

class ResellerController extends Controller
{
    public function index()
    {
        return view('admin.editer.resellers.index');
    }

    public function create()
    {
        return view('admin.editer.resellers.create');
    }

    public function store(ResellerRequest $request)
    {
        return redirect()->route('resellers.index')->with('success', 'Reseller created successfully.');
    }
}
