<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminUsersController extends Controller
{
    // List all admins
    public function index()
    {
        $users = User::where('role','admin')->get();
        return view('admin.layouts.users.index', compact('users'));
    }

    // Show create form
    public function create()
    {
        return view('admin.layouts.users.create');
    }

    // Store new admin
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|string|min:6|confirmed',
        ]);

        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'role'=>'admin', // only admin can be added
        ]);

        return redirect()->route('users.index')->with('success','Admin created successfully');
    }

    // Show edit form
    public function edit(User $user)
    {
        return view('admin.layouts.users.edit', compact('user'));
    }

    // Update admin
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|email|unique:users,email,'.$user->id,
            'password'=>'nullable|string|min:6|confirmed',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        if($request->filled('password')){
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('users.index')->with('success','Admin updated successfully');
    }

    // Delete admin
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success','Admin deleted successfully');
    }
}