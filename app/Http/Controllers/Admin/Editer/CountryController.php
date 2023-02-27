<?php

namespace App\Http\Controllers\Admin\Editer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\CountryRequest;
use App\Models\Admin\Editer\Country;
use Plank\Mediable\Facades\ImageManipulator;
use Plank\Mediable\HandlesMediaUploadExceptions;
use Plank\Mediable\Facades\MediaUploader;

class CountryController extends Controller
{
    public function index(Request $request)
    {
        $per_page = $request->per_page ? $request->per_page : config('pagination.per_page');
        $name = $request->name ? $request->name : null;
        $countries = Country::filter($request->all())->paginateFilter($per_page)->appends(['per_page' => $per_page, 'name' => $name]);
        return view('admin.editer.countries.index', compact('countries', 'per_page'))
            ->with('i', ($request->input('page', 1) - 1) * $per_page);
    }

    public function create()
    {
        return view('admin.editer.countries.create');
    }

    public function store(CountryRequest $request)
    {
        if($request->country_validation == "false") {
            return redirect()->back()->with('error', "Can't not find this country.");
        }
        $input = $request->all();
        $country = Country::create($input);
        return redirect()->route('countries.index')->with('success', 'Country created successfully.');
    }

    public function edit($id)
    {
        $country = Country::find($id);
        return view('admin.editer.countries.edit', compact('country'));
    }

    public function update(CountryRequest $request, $id)
    {
        if($request->country_validation == "false") {
            return redirect()->back()->with('error', "Can't not find this country.");
        }
        $country = Country::find($id);
        $country->name = $request->input('name');
        $country->code = $request->input('code');
        $country->code3 = $request->input('code3');
        $country->num_code = $request->input('num_code');
        $country->phone_code = $request->input('phone_code');
        $country->update();
        return redirect()->back()->with('success', 'Country updated successfully.');
    }

    public function destroy($id)
    {
        $country = Country::find($id);
        $country->delete();
        return redirect()->route('countries.index')->with('success','Country deleted successfully');
    }
}