<?php

namespace App\Http\Controllers\Admin\General;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\General\DongleUser;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class DongleUserController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:user-list|user-create|user-edit|user-delete', ['only' => ['index','store']]);
         $this->middleware('permission:user-create', ['only' => ['create','store']]);
         $this->middleware('permission:user-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:user-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $per_page = $request->per_page ? $request->per_page : config('pagination.per_page');
        $dongle_users = DongleUser::filter($request->all())->paginateFilter($per_page);
        return view('admin.general.dongles.index', compact('dongle_users'))
            ->with('i', ($request->input('page', 1) - 1) * $per_page);
    }

    public function edit($id)
    {
        $dongle_user = DongleUser::find($id);
        return view('admin.general.dongles.edit',compact('dongle_user'));
    }

    public function update(Request $request, $id)
    {
        $dongle_user = DongleUser::find($id);
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password'
        ]);
    
        $input = $request->all();
        if($request->ProPack == "true") 
            $input['ProPack'] = 1;
        else
            $input['ProPack'] = 0;

        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));    
        }
            
        $dongle_user->update($input);
        return redirect()->route('dongles.index')->with('success', 'Dongle User updated successfully.');
    }

    public function active(Request $request)
    {
        $activater = Auth::user();
        if(!empty($activater->getRoleNames()) && $activater->hasExactRoles('SuperAdmin')) {
            $activater->credits = config('infinite_amount');
        } else if($activater->can('transfer-credit-to-distributor') && $activater->can('transfer-credit-to-reseller') && !$activater->can('transfer-credit-to-user')) {
            $activater->credits = config('infinite_amount');
        }

        $result = []; $check = false;
        $dongle_user = DongleUser::find($request->id);
        if($dongle_user->ProPack == 1) {
            $result = [
                'success' => false,
                'msg' => 'Dongle User already activated.'
            ];
        } else {
            if($activater->credits >= config('dongle_user_activate_price')) {
                $check = true;
            } else {
                $result = [
                    'success' => false,
                    'msg' => 'Your balance is low to activate user.'
                ];
            }
        }

        if($check == true) {
            $dongle_user->ProPack = 1;
            $dongle_user->datetimeactivated = Carbon::now();
            if($activater->credits != config('infinite_amount'))
                $activater->credits = $activater->credits - config('dongle_user_activate_price');
            else
                $activater->credits = 0;
            $activater->save();
            $dongle_user->save();

            $result = [
                'success' => true,
                'msg' => 'User activated successfully.'
            ];
        }
        return $result;
    }
}
