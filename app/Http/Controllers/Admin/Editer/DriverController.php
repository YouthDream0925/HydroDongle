<?php

namespace App\Http\Controllers\Admin\Editer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\DriverRequest;
use App\Models\Admin\Editer\Driver;
use App\Models\Admin\Editer\Brand;
use App\Models\Admin\Editer\Cpu;

class DriverController extends Controller
{
    public function index(Request $request)
    {
        $per_page = $request->per_page ? $request->per_page : config('pagination.per_page');
        $name = $request->name ? $request->name : null;
        $drivers = Driver::filter($request->all())->paginateFilter($per_page)->appends(['per_page' => $per_page, 'name' => $name]);
        return view('admin.editer.drivers.index', compact('drivers', 'per_page'))
            ->with('i', ($request->input('page', 1) - 1) * $per_page);
    }

    public function create()
    {
        return view('admin.editer.drivers.create');
    }

    public function store(DriverRequest $request)
    {
        $input = $request->all();
        Driver::create($input);
        return redirect()->route('drivers.index')->with('success', 'Driver created successfully.');
    }

    public function edit($id)
    {
        $driver = Driver::find($id);
        $brand = $driver->brand;
        $cpu = $driver->cpu;
        return view('admin.editer.drivers.edit', compact('driver', 'brand', 'cpu'));
    }

    public function update(DriverRequest $request, $id)
    {
        $input = $request->all();
        $driver = Driver::find($id);
        $driver->update($input);
        return redirect()->back()->with('success', 'Driver updated successfully.');
    }

    public function destroy($id)
    {
        $driver = Driver::find($id);
        $driver->delete();
        return redirect()->route('drivers.index')->with('success', 'Driver deleted successfully.');
    }

    public function download()
    {
        $cpus = Cpu::orderBy('updated_at', 'desc')->get();
        $cpu = $cpus->first();
        $drivers = $cpu->drivers;
        return view('front.download.drivers', compact('drivers', 'cpus'));
    }

    public function drivers(Request $request)
    {
        $key = $request->key;
        $cpu = Cpu::find($key);
        $drivers = $cpu->drivers;
        $result = [
            'success' => true,
            'drivers' => $drivers
        ];
        
        return $result;
    }
}
