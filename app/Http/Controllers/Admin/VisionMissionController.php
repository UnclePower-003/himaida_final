<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VisionMission;
use Illuminate\Http\Request;

class VisionMissionController extends Controller
{
    public function index()
    {
        $data = VisionMission::latest()->get();

        return view('admin.layouts.aboutuspage.vision_mission.index', compact('data'));
    }

    public function create()
    {
        return view('admin.layouts.aboutuspage.vision_mission.form');
    }

    public function store(Request $request)
    {

        $data = new VisionMission;

        if ($request->hasFile('vision_icon')) {
            $file = $request->file('vision_icon');
            $name = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads/visionmission'), $name);
            $data->vision_icon = $name;
        }

        if ($request->hasFile('mission_icon')) {
            $file = $request->file('mission_icon');
            $name = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads/visionmission'), $name);
            $data->mission_icon = $name;
        }

        $data->vision_title = $request->vision_title;
        $data->vision_description = $request->vision_description;

        $data->mission_title = $request->mission_title;
        $data->mission_description = $request->mission_description;

        $data->save();

        return redirect()->route('visionmission.index')->with('success', 'Created Successfully');
    }

    public function edit($id)
    {
        $data = VisionMission::findOrFail($id);

        return view('admin.layouts.aboutuspage.vision_mission.form', compact('data'));
    }

    public function update(Request $request, $id)
    {

        $data = VisionMission::findOrFail($id);

        if ($request->hasFile('vision_icon')) {
            $file = $request->file('vision_icon');
            $name = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads/visionmission'), $name);
            $data->vision_icon = $name;
        }

        if ($request->hasFile('mission_icon')) {
            $file = $request->file('mission_icon');
            $name = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads/visionmission'), $name);
            $data->mission_icon = $name;
        }

        $data->vision_title = $request->vision_title;
        $data->vision_description = $request->vision_description;

        $data->mission_title = $request->mission_title;
        $data->mission_description = $request->mission_description;

        $data->save();

        return redirect()->route('visionmission.index')->with('success', 'Updated Successfully');
    }

    public function destroy($id)
    {
        VisionMission::findOrFail($id)->delete();

        return redirect()->back()->with('success', 'Deleted Successfully');
    }
}
