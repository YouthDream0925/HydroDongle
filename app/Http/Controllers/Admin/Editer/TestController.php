<?php

namespace App\Http\Controllers\Admin\Editer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TestRequest;
use Illuminate\Http\Request;
use App\Models\Admin\Editer\Test;
use Plank\Mediable\Facades\ImageManipulator;
use Plank\Mediable\HandlesMediaUploadExceptions;
use Plank\Mediable\Facades\MediaUploader;


class TestController extends Controller
{
    public function index(Request $request)
    {
        $per_page = $request->per_page ? $request->per_page : config('pagination.per_page');
        $name = $request->name ? $request->name : null;
        $tests = Test::filter($request->all())->paginateFilter($per_page)->appends(['per_page' => $per_page, 'name' => $name]);
        return view('admin.editer.tests.index', compact('tests', 'per_page'))
            ->with('i', ($request->input('page', 1) - 1) * $per_page);
    }

    public function create()
    {
        return view('admin.editer.tests.create');
    }

    public function store(TestRequest $request)
    {
        $input = $request->all();
        if($request->activate == "true")
            $input['activate'] = '1';
        else
            $input['activate'] = '0';
        $test = Test::create($input);

        try {
            if($request->file('test_image') != null) {
                $media = MediaUploader::fromSource($request->file('test_image'))
                    ->toDisk('points')
                        ->upload();
                    
                $test->attachMedia($media, 'test_image');
            }
        } catch (MediaUploadException $e) {
            throw $this->transformMediaUploadException($e);
        }

        return redirect()->route('tests.index')->with('success', 'Test Point created successfully');
    }

    public function edit($id)
    {
        $test = Test::find($id);
        return view('admin.editer.tests.edit', compact('test'));
    }

    public function update(TestRequest $request, $id)
    {
        $test = Test::find($id);
        $test->name = $request->input('name');
        if($request->activate == "true")
            $test->activate = '1';
        else
            $test->activate = '0';
        if($request->file('test_image') != null) {
            if($test->hasMedia('test_image')) {
                $media = $test->getMedia('test_image')->first();
                $media->delete();
            }

            $media = MediaUploader::fromSource($request->file('test_image'))
                ->toDisk('points')
                    ->upload();
            
            $test->attachMedia($media, 'test_image');
        }

        $test->update();
        return redirect()->back()->with('success','Test Point updated successfully');
    }

    public function destroy($id)
    {
        $test = Test::find($id);
        if($test->hasMedia('test_image')) {
            $media = $test->getMedia('test_image')->first();
            $media->delete();
        }
        $test->delete();

        return redirect()->route('tests.index')->with('success','Test Point deleted successfully');
    }
}
