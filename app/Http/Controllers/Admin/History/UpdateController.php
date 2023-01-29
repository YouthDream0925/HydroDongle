<?php

namespace App\Http\Controllers\Admin\History;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\UpdateRequest;
use App\Models\Admin\History\Update;

class UpdateController extends Controller
{
    public function index()
    {
        $updates = Update::all();
        return view('admin.history.updates.index', compact('updates'));
    }

    public function create()
    {
        return view('admin.history.updates.create');
    }

    public function store(UpdateRequest $request)
    {
        $input = $request->all();
        if($request->activate == "true")
            $input['activate'] = '1';
        else
            $input['activate'] = '0';
        Update::create($input);
        return redirect()->route('updates.index')->with('success', 'Update History created successfully.');
    }

    public function edit($id)
    {
        $update = Update::find($id);
        return view('admin.history.updates.edit', compact('update'));
    }

    public function update(UpdateRequest $request, $id)
    {
        $update = Update::find($id);
        $update->title = $request->title;
        $update->version = $request->version;
        $update->date = $request->date;
        $update->content = $request->content;
        if($request->activate == "true")
            $update->activate = '1';
        else
            $update->activate = '0';
        
        $update->update();
        return redirect()->back()->with('success', 'Update History updated successfully.');
    }

    public function destroy($id)
    {
        $update = Update::find($id);
        $update->delete();
        return redirect()->route('updates.index')->with('success', 'Update History updated successfully.');
    }
}
