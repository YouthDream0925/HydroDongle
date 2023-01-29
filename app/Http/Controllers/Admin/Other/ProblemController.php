<?php

namespace App\Http\Controllers\Admin\Other;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Other\Problem;

class ProblemController extends Controller
{
    public function index()
    {
        $problems = Problem::all();
        return view('admin.other.problems.index', compact('problems'));
    }

    public function delete(Request $request)
    {
        $result = [];
        $id = $request->problem_key;
        $problem = Problem::find($id);
        if($problem != null) {
            $problem->delete();
            $result = [
                'success' => true,
                'msg' => 'Problem deleted successfully.'
            ];
        } else {
            $result = [
                'success' => false,
                'msg' => 'Can not find this problem.'
            ];
        }
            
        return $result;
    }
}
