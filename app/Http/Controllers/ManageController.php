<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ManageController extends Controller
{
    public function Manage_User_List()
    {
        $user = User::with('Roles')->get();

        return view('pages.manage_user.manage_user', compact('user'));
    }

    public function Manage_User_Show_Add()
    {
        $roles = Roles::all();

        return view('pages.manage_user.manage_user_add', compact('roles'));
    }

    public function Manage_User_Show_Edit($username)
    {
        $data = User::where('username', $username)->first();
        $roles = Roles::all();

        return view('pages.manage_user.manage_user_edit', compact('data', 'roles'));
    }

    public function Manage_User_Edit(Request $request, $username)
    {
        //dd($request->all());
        if ($request->password == null) {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email:dns',
                'role_id' => 'required',
                'is_active' => 'required',
            ]);

            User::where('username', $username)->update([
                'name' => $request->name,
                'email' => $request->email,
                'role_id' => $request->role_id,
                'is_active' => $request->is_active == 'true' ? true : false,
            ]);

        } else {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email:dns',
                'password' => 'required|min:8',
                'role_id' => 'required',
                'is_active' => 'required',
            ]);

            User::where('username', $username)->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role_id' => $request->role_id,
                'is_active' => $request->is_active == 'true' ? true : false,
            ]);

        }

        return back();
    }

    public function Manage_User_Add(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'username' => 'required|unique:users|min:5',
            'name' => 'required',
            'email' => 'required|email:dns',
            'password' => 'required|min:8',
            'role_id' => 'required',
            'is_active' => 'required',
        ]);

        User::create([
            'username' => $request->username,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id,
            'is_active' => $request->is_active == 'true' ? true : false,
        ]);

        return redirect()->route('manage.user_list');
    }

    public function Manage_User_NonActive(Request $request, $id)
    {
        User::where('id', $id)->update([
            'is_active' => $request->is_active == 'true' ? true : false,
        ]);

        return redirect()->route('manage.user_list');
    }
}
