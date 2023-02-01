<?php

namespace App\Http\Controllers\Admin\History;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\CreditRequest;
use App\Models\Admin\History\CreditHistory;

class CreditController extends Controller
{
    public function index(Request $request)
    {
        $per_page = $request->per_page ? $request->per_page : config('pagination.per_page');
        $histories = CreditHistory::orderBy('created_at','DESC')->paginate($per_page);
        return view('admin.history.credits.index', compact('histories'));
    }

    public function before()
    {
        $admins = Admin::all();
        $sender = Auth::user();
        if(!empty($sender->getRoleNames()) && $sender->hasExactRoles('SuperAdmin')) {
            $sender->credit = config('infinite_amount');
        } else if($sender->can('transfer-credit-to-distributor') && $sender->can('transfer-credit-to-reseller') && !$sender->can('transfer-credit-to-user')) {
            $sender->credit = config('infinite_amount');
        }
        return view('admin.history.credits.before', compact('admins', 'sender'));
    }

    public function transfer(CreditRequest $request)
    {
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
                    if($sender->credit >= $amount) {
                        $right_permissoin = true;
                        $sender->credit = $sender->credit - $amount;
                    } else {
                        $right_permissoin = false;
                        $msg = "Your balance is low to transfer credit.";
                    }
                } else if(!$recipient->can('transfer-credit-to-distributor') && !$recipient->can('transfer-credit-to-reseller') && !$recipient->can('transfer-credit-to-user')) {
                    if($sender->credit >= $amount) {
                        $right_permissoin = true;
                        $sender->credit = $sender->credit - $amount;
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
                    if($sender->credit >= $amount) {
                        $right_permissoin = true;
                        $sender->credit = $sender->credit - $amount;
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
            $total = $recipient->credit + $amount;
            if($total > config('max_credit_amount')) {
                $recipient->credit = config('max_credit_amount');
                $recipient->save();
            } else {
                $recipient->credit = $total;
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
    }
}