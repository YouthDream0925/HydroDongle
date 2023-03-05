<?php

namespace App\Http\Controllers\Admin\History;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\History\PaymentHistory;

class PaymentController extends Controller
{
    public function index(Request $request)
    {
        $per_page = $request->per_page ? $request->per_page : config('pagination.per_page');
        $name = $request->name ? $request->name : null;
        $payments = PaymentHistory::filter($request->all())->paginateFilter($per_page)->appends(['per_page' => $per_page, 'name' => $name]);
        return view('admin.history.payments.index', compact('payments', 'per_page'))
            ->with('i', ($request->input('page', 1) - 1) * $per_page);
    }

    public function show($id)
    {
        $payment = PaymentHistory::find($id);
        return view('admin.history.payments.show', compact('payment'));
    }

    public function destroy($id)
    {
        $payment = PaymentHistory::find($id);
        $payment->delete();
        return redirect()->route('payments.index')->with('success', 'Payment history deleted successfully.');
    }
}
