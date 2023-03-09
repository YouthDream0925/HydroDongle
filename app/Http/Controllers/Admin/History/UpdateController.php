<?php

namespace App\Http\Controllers\Admin\History;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\UpdateRequest;
use App\Models\Admin\History\Update;

class UpdateController extends Controller
{
    public function index(Request $request)
    {
        $per_page = $request->per_page ? $request->per_page : config('pagination.per_page');
        $name = $request->name ? $request->name : null;
        $updates = Update::filter($request->all())->paginateFilter($per_page)->appends(['per_page' => $per_page, 'name' => $name]);
        return view('admin.history.updates.index', compact('updates', 'per_page'))
            ->with('i', ($request->input('page', 1) - 1) * $per_page);
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
        $update->type = $request->type;
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
