<?php

namespace App\Http\Controllers\Admin\Editer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\CpuRequest;
use App\Models\Admin\Editer\Cpu;
use App\Models\Admin\Editer\Soc;
use Plank\Mediable\Facades\ImageManipulator;
use Plank\Mediable\HandlesMediaUploadExceptions;
use Plank\Mediable\Facades\MediaUploader;

class CpuController extends Controller
{
    public function index(Request $request)
    {
        $per_page = $request->per_page ? $request->per_page : config('pagination.per_page');
        $name = $request->name ? $request->name : null;
        $cpus = Cpu::filter($request->all())->paginateFilter($per_page)->appends(['per_page' => $per_page, 'name' => $name]);
        return view('admin.editer.cpus.index', compact('cpus', 'per_page'))
            ->with('i', ($request->input('page', 1) - 1) * $per_page);
    }

    public function create()
    {
        return view('admin.editer.cpus.create');
    }

    public function store(CpuRequest $request)
    {
        $input = $request->all();
        $cpu = Cpu::create($input);
        try {
            if($request->file('cpu_image') != null) {
                $media = MediaUploader::fromSource($request->file('cpu_image'))
                    ->toDisk('cpus')
                    ->upload();
                    
                $cpu->attachMedia($media, 'cpu_image');
            }
        } catch (MediaUploadException $e) {
            throw $this->transformMediaUploadException($e);
        }
        return redirect()->route('cpus.edit', $cpu->id)->with('success', 'CPU created successfully.');
    }

    public function edit($id)
    {
        $cpu = Cpu::find($id);
        return view('admin.editer.cpus.edit', compact('cpu'));
    }

    public function update(CpuRequest $request, $id)
    {
        $cpu = Cpu::find($id);
        $cpu->name = $request->name;
        $cpu->explanation = $request->explanation;

        if($request->file('cpu_image') != null) {
            if($cpu->hasMedia('cpu_image')) {
                $media = $cpu->getMedia('cpu_image')->first();
                $media->delete();
            }

            $media = MediaUploader::fromSource($request->file('cpu_image'))
                ->toDisk('cpus')
                    ->upload();
            
            $cpu->attachMedia($media, 'cpu_image');
        }

        $cpu->update();
        return redirect()->back()->with('success','CPU updated successfully.');
    }

    public function destroy($id)
    {
        $cpu = Cpu::find($id);
        foreach($cpu->socs as $soc)
            $soc->delete();

        if($cpu->hasMedia('cpu_image')) {
            $media = $cpu->getMedia('cpu_image')->first();
            $media->delete();
        }

        foreach($cpu->models as $model) {
            $model->delete();
        }

        foreach($cpu->drivers as $driver) {
            $driver->delete();
        }

        foreach($cpu->helps as $help) {
            $help->delete();
        }

        $cpu->delete();
        return redirect()->route('cpus.index')
                        ->with('success','CPU deleted successfully.');
    }

    public function save_soc(Request $request)
    {
        $result = [];
        $flag = false; $msg = null;
        $old_key = $request->old_key;
        $new_key = null;
        $cpu_key = $request->cpu_key;
        $name = $request->name;
        $explanation = $request->explanation;

        if($old_key != null) {
            $soc = Soc::find($old_key);
            if($soc->cpu != $cpu_key) {
                $flag = false; $msg = "Can't find SOC.";
            } else {
                $soc->name = $name;
                $soc->explanation = $explanation;
                $soc->save();
                $flag = true; $msg = "SOC saved successfully.";
            }
        } else {
            $soc = Soc::create([
                'cpu' => $cpu_key,
                'name' => $name,
                'explanation' => $explanation
            ]);
            $new_key = $soc->id;
            $flag = true; $msg = "SOC saved successfully.";
        }

        $result = [
            'success' => $flag,
            'msg' => $msg,
            'new_key' => $new_key
        ];
        return $result;
    }

    public function delete_soc(Request $request)
    {
        $result = [];
        $old_key = $request->old_key;
        $soc = Soc::find($old_key);
        if($soc != null) {
            $soc->delete();
            $result = [
                'success' => true,
                'msg' => 'SOC deleted successfully.'
            ];
        } else {
            $result = [
                'success' => false,
                'msg' => "Can't find SOC."
            ];
        }
        return $result;
    }
}