<?php

namespace App\Http\Controllers\Admin\Editer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\ResellerRequest;
use App\Models\Admin\Editer\Country;
use App\Models\Admin\Editer\Reseller;

class ResellerController extends Controller
{
    public function index(Request $request)
    {
        $per_page = $request->per_page ? $request->per_page : config('pagination.per_page');
        $resellers = Reseller::Popular($request->per_page);
        return view('admin.editer.resellers.index', compact('resellers'))
            ->with('i', ($request->input('page', 1) - 1) * $per_page);
    }

    public function create()
    {
        $countries = Country::select('id', 'country', 'alpha_2')->get();
        return view('admin.editer.resellers.create', compact('countries'));
    }

    public function store(ResellerRequest $request)
    {
        $input = $request->all();
        if($request->activate == "true")
            $input['activate'] = '1';
        else
            $input['activate'] = '0';
        $reseller = Reseller::create($input);
        
        return redirect()->route('resellers.index')->with('success', 'Reseller created successfully.');
    }

    public function edit($id)
    {
        $reseller = Reseller::find($id);
        $countries = Country::select('id', 'country', 'alpha_2')->get();
        return view('admin.editer.resellers.edit', compact('reseller', 'countries'));
    }

    public function update(ResellerRequest $request, $id)
    {
        $reseller = Reseller::find($id);

        $input = $request->all();
        if($request->activate == "true")
            $input['activate'] = '1';
        else
            $input['activate'] = '0';

        $reseller->update($input);

        return redirect()->back()->with('success', 'Reseller updated successfully.');
    }

    public function destroy($id)
    {
        $reseller = Reseller::find($id);
        $reseller->delete();
        return redirect()->route('resellers.index')->with('success', 'Reseller deleted successfully.');
    }

    public function agents($type)
    {
        $countries = Country::all();
        $resellers_country = [];
        foreach($countries as $country) {
            if(count($country->resellers_by_type($type)) != 0) {
                array_push($resellers_country, $country);
                foreach($country->resellers as $reseller)
                {
                    $trim_name = preg_replace('/\s+/', '', $reseller->name);
                    $trim_name = strtolower($trim_name);
                    $country->reseller_names = $country->reseller_names.$trim_name.',';
                }
            }
        }
        array_unique($resellers_country);
        return view('front.agent', compact('resellers_country'));
    }
}