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
        $countries = Country::Popular($request->per_page);
        return view('admin.editer.countries.index', compact('countries'))
            ->with('i', ($request->input('page', 1) - 1) * $per_page);
    }

    public function create()
    {
        return view('admin.editer.countries.create');
    }

    public function store(CountryRequest $request)
    {
        $input = $request->all();
        $country = Country::create($input);

        try {
            if($request->file('country_image') != null) {
                $media = MediaUploader::fromSource($request->file('country_image'))
                    ->toDisk('countries')
                        ->upload();

                $country->attachMedia($media, 'country_image');
            }
        } catch (MediaUploadException $e) {
            throw $this->transformMediaUploadException($e);
        }

        return redirect()->route('countries.index')->with('success', 'Country created successfully.');
    }

    public function edit($id)
    {
        $country = Country::find($id);
        return view('admin.editer.countries.edit', compact('country'));
    }

    public function update(CountryRequest $request, $id)
    {
        $country = Country::find($id);
        $country->name = $request->input('name');
        $country->code = $request->input('code');
        $country->code3 = $request->input('code3');
        $country->num_code = $request->input('num_code');
        $country->phone_code = $request->input('phone_code');
        if($request->file('country_image') != null) {
            if($country->hasMedia('country_image')) {
                $media = $country->getMedia('country_image')->first();
                $media->delete();
            }

            $media = MediaUploader::fromSource($request->file('country_image'))
                ->toDisk('countries')
                    ->upload();
            
            $country->attachMedia($media, 'country_image');
        }

        $country->update();
        return redirect()->back()->with('success', 'Country updated successfully.');
    }

    public function destroy($id)
    {
        $country = Country::find($id);
        if($country->hasMedia('country_image')) {
            $media = $country->getMedia('country_image')->first();
            $media->delete();
        }
        $country->delete();

        return redirect()->route('countries.index')->with('success','Country deleted successfully');
    }
}