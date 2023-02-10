<?php

namespace App\Http\Controllers\Admin\Editer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FaqRequest;
use App\Models\Admin\Editer\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index(Request $request)
    {
        $per_page = $request->per_page ? $request->per_page : config('pagination.per_page');
        $faqs = Faq::Popular($request->per_page);
        return view('admin.editer.faqs.index', compact('faqs'))
            ->with('i', ($request->input('page', 1) - 1) * $per_page);
    }

    public function create()
    {
        return view('admin.editer.faqs.create');
    }

    public function store(FaqRequest $request)
    {
        $input = $request->all();
        $faq = Faq::create($input);
        return redirect()->route('faqs.index')->with('success', 'FAQ created successfully.');
    }

    public function edit($id)
    {
        $faq = Faq::find($id);
        return view('admin.editer.faqs.edit', compact('faq'));
    }

    public function update(FaqRequest $request, $id)
    {
        $faq = Faq::find($id);
        $input = $request->all();
        $faq->update($input);
        return redirect()->back()->with('success', 'FAQ updated successfully.');
    }

    public function destroy($id)
    {
        $faq = Faq::find($id);
        $faq->delete();
        return redirect()->route('faqs.index')->with('success', 'FAQ deleted successfully.');
    }
}