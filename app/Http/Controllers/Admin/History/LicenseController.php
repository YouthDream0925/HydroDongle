<?php

namespace App\Http\Controllers\Admin\History;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\History\LicenseHistory;

class LicenseController extends Controller
{
    public function index(Request $request)
    {
        $per_page = $request->per_page ? $request->per_page : config('pagination.per_page');
        $name = $request->name ? $request->name : null;
        $licenses = LicenseHistory::filter($request->all())->paginateFilter($per_page)->appends(['per_page' => $per_page, 'name' => $name]);

        return view('admin.history.licenses.index', compact('licenses', 'per_page'))
            ->with('i', ($request->input('page', 1) - 1) * $per_page);
    }

    public function show($id)
    {
        $license_history = LicenseHistory::find($id);
        return view('admin.history.licenses.show', compact('license_history'));
    }

    public function destroy($id)
    {
        $license_history = LicenseHistory::find($id);
        $license_history->delete();
        return redirect()->route('licenses.index')->with('success', 'License deleted successfully.');
    }
}
