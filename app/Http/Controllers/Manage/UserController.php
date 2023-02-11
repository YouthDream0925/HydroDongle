<?php
    
namespace App\Http\Controllers\Manage;
    
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
    
class UserController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:user-list|user-create|user-edit|user-delete', ['only' => ['index','store']]);
         $this->middleware('permission:user-create', ['only' => ['create','store']]);
         $this->middleware('permission:user-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:user-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $per_page = $request->per_page ? $request->per_page : config('pagination.per_page');
        $users = User::filter($request->all())->paginateFilter($per_page);
        return view('admin.general.users.index', compact('users'))
            ->with('i', ($request->input('page', 1) - 1) * $per_page);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        return view('admin.general.users.create',compact('roles'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);
    
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
    
        $user = User::create($input);
        $user->assignRole($request->input('roles'));
    
        return redirect()->route('users.index')
                        ->with('success','User created successfully');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('admin.general.users.show',compact('user'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
    
        return view('admin.general.users.edit',compact('user','roles','userRole'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password'
        ]);
    
        $input = $request->all();
        if($request->isactivated == "true") {
            if($user->isactivated == '0') {                
                if($request->period == "") {
                    return redirect()->back()
                        ->with('error', 'Please select period.');
                } else {
                    $input['datetimeactivated'] = Carbon::now();
                    $input['datetimeexpired'] = Carbon::now()->addMonth($request->period);
                }
            }
            $input['isactivated'] = '1';
        }
        else {
            $input['isactivated'] = '0';
            $input['datetimeactivated'] = null;
            $input['datetimeexpired'] = null;
        }

        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));    
        }
            
        $user->update($input);
        return redirect()->route('users.index')
                        ->with('success', 'User updated successfully.');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')
                        ->with('success','User deleted successfully.');
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
        $user = User::find($request->id);
        if($user->isactivated == '1') {
            $result = [
                'success' => false,
                'msg' => 'User already activated.'
            ];
        } else {
            if($request->period == 6) {
                if($activater->credits >= 40) {
                    $check = true;
                } else {
                    $result = [
                        'success' => false,
                        'msg' => 'Your balance is low to activate user.'
                    ];
                }
            } elseif($request->period == 12) {
                if($activater->credits >= 70) {
                    $check = true;
                } else {
                    $result = [
                        'success' => false,
                        'msg' => 'Your balance is low to activate user.'
                    ];
                }
            } else {
                $result = [
                    'success' => false,
                    'msg' => 'Unexpected error occured.'
                ];
            }
        }

        if($check == true) {
            $user->isactivated = '1';
            $user->datetimeactivated = Carbon::now();
            $user->datetimeexpired = Carbon::now()->addMonth($request->period);
            if($request->period == 6 && $activater->credits != config('infinite_amount')) {
                $activater->credits = $activater->credits - 40;
            } elseif($request->period == 12 && $activater->credits != config('infinite_amount')) {
                $activater->credits = $activater->credits - 70;
            } else {
                $activater->credits = 0;
            }
            $activater->save();
            $user->save();

            $result = [
                'success' => true,
                'msg' => 'User activated successfully.',
                'expired_time' => Carbon::parse($user->datetimeexpired)->format('M d, Y')
            ];
        }
        return $result;
    }
}