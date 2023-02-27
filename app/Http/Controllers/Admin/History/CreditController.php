<?php

namespace App\Http\Controllers\Admin\History;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
use App\Models\Admin\General\DongleUser;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\CreditRequest;
use App\Models\Admin\History\CreditHistory;

class CreditController extends Controller
{
    public function index(Request $request)
    {
        $per_page = $request->per_page ? $request->per_page : config('pagination.per_page');
        $name = $request->name ? $request->name : null;
        $histories = CreditHistory::filter($request->all())->paginateFilter($per_page)->appends(['per_page' => $per_page, 'name' => $name]);
        return view('admin.history.credits.index', compact('histories', 'per_page'))
            ->with('i', ($request->input('page', 1) - 1) * $per_page);
    }

    public function before()
    {
        $recipient_group = [
            '0' => 'Resellers',
            '1' => 'Distributors',
            '2' => 'Online/Licence Users',
            '3' => 'Dongle Users'
        ];

        $admins = Admin::all();
        $users = User::all();
        $dongle_users = DongleUser::all();
        $sender = Auth::user();
        if(!empty($sender->getRoleNames()) && $sender->hasExactRoles('SuperAdmin')) {
            $sender->credits = config('infinite_amount');
        } else if($sender->can('transfer-credit-to-distributor') && $sender->can('transfer-credit-to-reseller') && !$sender->can('transfer-credit-to-user')) {
            $sender->credits = config('infinite_amount');
        }
        return view('admin.history.credits.before', compact('admins', 'users', 'dongle_users', 'sender', 'recipient_group'));
    }

    public function transfer(CreditRequest $request)
    {
        $type = $request->recipient_type;
        if($type == '0' || $type == '1') {
            $sender = Auth::user();
            $recipient = Admin::find($request->recipient);
            $amount = $request->amount;
            $right_permissoin = false;
            $msg = "";
    
            if(!empty($sender->getRoleNames()) && $sender->hasExactRoles('SuperAdmin')) {
                $right_permissoin = true;
            } else {
                if($sender->can('transfer-credit-to-distributor') && $sender->can('transfer-credit-to-reseller') && !$sender->can('transfer-credit-to-user')) {
                    if(!$recipient->can('transfer-credit-to-distributor') && $recipient->can('transfer-credit-to-reseller') && $recipient->can('transfer-credit-to-user')) {
                        $right_permissoin = true;
                    } else if(!$recipient->can('transfer-credit-to-distributor') && !$recipient->can('transfer-credit-to-reseller') && $recipient->can('transfer-credit-to-user')){
                        $right_permissoin = true;
                    } else {
                        $right_permissoin = false;
                        $msg = "You can't transfer credit to this recipient. Recipient doesn't have permission to receive credit.";
                    }
                } else if(!$sender->can('transfer-credit-to-distributor') && $sender->can('transfer-credit-to-reseller') && $sender->can('transfer-credit-to-user')) {
                    if(!$recipient->can('transfer-credit-to-distributor') && !$recipient->can('transfer-credit-to-reseller') && $recipient->can('transfer-credit-to-user')) {
                        if($sender->credits >= $amount) {
                            $right_permissoin = true;
                            $sender->credits = $sender->credits - $amount;
                        } else {
                            $right_permissoin = false;
                            $msg = "Your balance is low to transfer credit.";
                        }
                    } else if(!$recipient->can('transfer-credit-to-distributor') && !$recipient->can('transfer-credit-to-reseller') && !$recipient->can('transfer-credit-to-user')) {
                        if($sender->credits >= $amount) {
                            $right_permissoin = true;
                            $sender->credits = $sender->credits - $amount;
                        } else {
                            $right_permissoin = false;
                            $msg = "Your balance is low to transfer credit.";
                        }
                    } else {
                        $right_permissoin = false;
                        $msg = "You can't transfer credit to this recipient. Recipient doesn't have permission to receive credit.";
                    }
                } else if($sender->can('transfer-credit-to-user')){
                    if(!$recipient->can('transfer-credit-to-distributor') && !$recipient->can('transfer-credit-to-reseller') && !$recipient->can('transfer-credit-to-user')) {
                        if($sender->credits >= $amount) {
                            $right_permissoin = true;
                            $sender->credits = $sender->credits - $amount;
                        } else {
                            $right_permissoin = false;
                            $msg = "Your balance is low to transfer credit.";
                        }
                    } else {
                        $right_permissoin = false;
                        $msg = "You can't transfer credit to this recipient. Recipient doesn't have permission to receive credit.";
                    }
                } else {
                    $right_permissoin = false;
                    $msg = "You don't have permission.";
                }
            }
    
            if($right_permissoin == true) {
                $sender->save();
                $total = $recipient->credits + $amount;
                if($total > config('max_credit_amount')) {
                    $recipient->credits = config('max_credit_amount');
                    $recipient->save();
                } else {
                    $recipient->credits = $total;
                    $recipient->save();
                }
                CreditHistory::create([
                    'sender' => $sender->email,
                    'recipient' => $recipient->email,
                    'amount' => $amount,
                    'status' => '1',
                ]);
                return redirect()->back()->with('success', "Credits transferd successfully.");
            } else {
                CreditHistory::create([
                    'sender' => $sender->email,
                    'recipient' => $recipient->email,
                    'amount' => $amount,
                    'status' => '0',
                ]);
                return redirect()->back()->with('error', $msg);
            }
        } else if($type == '2') {
            $sender = Auth::user();
            $recipient = User::find($request->recipient);
            $amount = $request->amount;
            $right_permissoin = false;
            $msg = "";

            if(!empty($sender->getRoleNames()) && $sender->hasExactRoles('SuperAdmin')) {
                $right_permissoin = true;
            } else {
                if($sender->can('transfer-credit-to-user')) {
                    if($sender->credits >= $amount) {
                        $right_permissoin = true;
                        $sender->credits = $sender->credits - $amount;
                    } else {
                        $right_permissoin = false;
                        $msg = "Your balance is low to transfer credit.";
                    }
                } else {
                    $right_permissoin = false;
                    $msg = "You don't have right permission.";
                }
            }

            if($right_permissoin == true) {
                $sender->save();
                $total = $recipient->credits + $amount;
                if($total > config('max_credit_amount')) {
                    $recipient->credits = config('max_credit_amount');
                    $recipient->save();
                } else {
                    $recipient->credits = $total;
                    $recipient->save();
                }
                CreditHistory::create([
                    'sender' => $sender->email,
                    'recipient' => $recipient->email,
                    'amount' => $amount,
                    'status' => '1',
                ]);
                return redirect()->back()->with('success', "Credits transferd successfully.");
            } else {
                CreditHistory::create([
                    'sender' => $sender->email,
                    'recipient' => $recipient->email,
                    'amount' => $amount,
                    'status' => '0',
                ]);
                return redirect()->back()->with('error', $msg);
            }
        } else if($type == '3') {
            $sender = Auth::user();
            $recipient = DongleUser::find($request->recipient);
            $amount = $request->amount;
            $right_permissoin = false;
            $msg = "";
    
            if(!empty($sender->getRoleNames()) && $sender->hasExactRoles('SuperAdmin')) {
                $right_permissoin = true;
            } else {
                if($sender->can('transfer-credit-to-user')) {
                    if($sender->credits >= $amount) {
                        $right_permissoin = true;
                        $sender->credits = $sender->credits - $amount;
                    } else {
                        $right_permissoin = false;
                        $msg = "Your balance is low to transfer credit.";
                    }
                } else {
                    $right_permissoin = false;
                    $msg = "You don't have right permission.";
                }
            }
    
            if($right_permissoin == true) {
                $sender->save();
                $total = $recipient->credits + $amount;
                if($total > config('max_credit_amount')) {
                    $recipient->credits = config('max_credit_amount');
                    $recipient->save();
                } else {
                    $recipient->credits = $total;
                    $recipient->save();
                }
                CreditHistory::create([
                    'sender' => $sender->email,
                    'recipient' => $recipient->email,
                    'amount' => $amount,
                    'status' => '1',
                ]);
                return redirect()->back()->with('success', "Credits transferd successfully.");
            } else {
                CreditHistory::create([
                    'sender' => $sender->email,
                    'recipient' => $recipient->email,
                    'amount' => $amount,
                    'status' => '0',
                ]);
                return redirect()->back()->with('error', $msg);
            }
        } else {
        }
    }
    
    public function users(Request $request)
    {
        $type = $request->type;
        $result = [];
        if($type == '0') {
            $real_users = [];
            $users = Admin::select('id', 'email')->get();
            foreach($users as $user) {
                if($user->can('transfer-credit-to-user') && !$user->can('transfer-credit-to-reseller') && !$user->can('transfer-credit-to-distributor')) {
                    array_push($real_users, $user);
                }
            }
            $result = [
                'success' => true,
                'users' => $real_users
            ];
        } else if($type == '1') {
            $real_users = [];
            $users = Admin::select('id', 'email')->get();
            foreach($users as $user) {
                if($user->can('transfer-credit-to-user') && $user->can('transfer-credit-to-reseller') && !$user->can('transfer-credit-to-distributor')) {
                    array_push($real_users, $user);
                }
            }
            $result = [
                'success' => true,
                'users' => $real_users
            ];
        } else if($type == '2') {
            $users = User::select('id', 'email')->get();
            $result = [
                'success' => true,
                'users' => $users
            ];
        } else if($type == '3') {
            $users = DongleUser::select('id', 'email')->get();
            $result = [
                'success' => true,
                'users' => $users
            ];
        } else {
            $result = [
                'success' => false,
                'users' => null
            ];
        }

        return $result;
    }
}