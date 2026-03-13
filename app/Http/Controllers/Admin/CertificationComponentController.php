<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CertificationComponent;

class CertificationComponentController extends Controller
{

    public function index()
    {
        $items = CertificationComponent::latest()->get();
        return view('admin.layouts.certificationcomponent.index', compact('items'));
    }

    public function create()
    {
        $item = new CertificationComponent();
        return view('admin.layouts.certificationcomponent.form', compact('item'));
    }

    public function store(Request $request)
    {

        $data = $request->validate([
            'title' => 'required',
            'image' => 'nullable|image'
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('certificationcomponent', 'public');
        }

        CertificationComponent::create($data);

        return redirect()->route('certificationcomponent.index')
            ->with('success','Created successfully');
    }

    public function edit($id)
    {
        $item = CertificationComponent::findOrFail($id);
        return view('admin.layouts.certificationcomponent.form', compact('item'));
    }

    public function update(Request $request, $id)
    {

        $item = CertificationComponent::findOrFail($id);

        $data = $request->validate([
            'title' => 'required',
            'image' => 'nullable|image'
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('certificationcomponent', 'public');
        }

        $item->update($data);

        return redirect()->route('certificationcomponent.index')
            ->with('success','Updated successfully');
    }

    public function destroy($id)
    {
        CertificationComponent::findOrFail($id)->delete();

        return back()->with('success','Deleted successfully');
    }

}