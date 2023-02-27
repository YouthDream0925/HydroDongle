<?php

namespace App\Http\Controllers\Admin\Editer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\HelpRequest;
use App\Models\Admin\Editer\Help;
use App\Models\Admin\Editer\Brand;
use App\Models\Admin\Editer\Cpu;

class HelpController extends Controller
{
    public function index(Request $request)
    {
        $per_page = $request->per_page ? $request->per_page : config('pagination.per_page');
        $name = $request->name ? $request->name : null;
        $helps = Help::filter($request->all())->paginateFilter($per_page)->appends(['per_page' => $per_page, 'name' => $name]);
        return view('admin.editer.helps.index', compact('helps', 'per_page'))
            ->with('i', ($request->input('page', 1) - 1) * $per_page);
    }

    public function create()
    {
        return view('admin.editer.helps.create');
    }

    public function store(HelpRequest $request)
    {
        $input = $request->all();
        if($request->activate == "true")
            $input['activate'] = '1';
        else
            $input['activate'] = '0';
        $help = Help::create($input);

        return redirect()->route('helps.index')->with('success', 'Help created successfully.');
    }

    public function edit($id)
    {
        $help = Help::find($id);
        $brand = Brand::find($help->brand_id);
        $cpu = Cpu::find($help->cpu_id);
        return view('admin.editer.helps.edit', compact('help', 'brand', 'cpu'));
    }

    public function update(HelpRequest $request, $id)
    {
        $help = Help::find($id);
        $input = $request->all();
        if($request->activate == "true")
            $input['activate'] = '1';
        else
            $input['activate'] = '0';
        $help->update($input);

        return redirect()->back()->with('success', 'Help updated successfully.');
    }

    public function destroy($id)
    {
        $help = Help::find($id);
        $help->delete();
        return redirect()->route('helps.index')->with('success', 'Help deleted successfully.');
    }
}
