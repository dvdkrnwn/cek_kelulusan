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
        $data = User::where('Username', $username)->first();
        $roles = Roles::all();

        return view('pages.manage_user.manage_user_edit', compact('data', 'roles'));
    }

    public function Manage_User_Edit(Request $request, $username)
    {
        //dd($request->all());
        if ($request->Password == null) {
            $request->validate([
                'Name' => 'required',
                'Email' => 'required|email:dns',
                'Role_Id' => 'required',
                'Is_Active' => 'required',
            ]);

            User::where('username', $username)->update([
                'Name' => $request->Name,
                'Email' => $request->Email,
                'Role_Id' => $request->Role_Id,
                'Is_Active' => $request->Is_Active == 'true' ? true : false,
            ]);

        } else {
            $request->validate([
                'Name' => 'required',
                'Email' => 'required|email:dns',
                'Password' => 'required|min:8',
                'Role_Id' => 'required',
                'Is_Active' => 'required',
            ]);

            User::where('username', $username)->update([
                'Name' => $request->Name,
                'Email' => $request->Email,
                'Password' => Hash::make($request->Password),
                'Role_Id' => $request->Role_Id,
                'Is_Active' => $request->Is_Active == 'true' ? true : false,
            ]);

        }

        return back();
    }

    public function Manage_User_Add(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'Username' => 'required|unique:users|min:5',
            'Name' => 'required',
            'Email' => 'required|email:dns',
            'Password' => 'required|min:8',
            'Role_Id' => 'required',
            'Is_Active' => 'required',
        ]);

        User::create([
            'Username' => $request->Username,
            'Name' => $request->Name,
            'Email' => $request->Email,
            'Password' => Hash::make($request->Password),
            'Role_Id' => $request->Role_Id,
            'Is_Active' => $request->Is_Active == 'true' ? true : false,
        ]);

        return redirect()->route('manage.user_list');
    }

    public function Manage_User_NonActive(Request $request, $id)
    {
        User::where('id', $id)->update([
            'Is_Active' => $request->Is_Active == 'true' ? true : false,
        ]);

        return redirect()->route('manage.user_list');
    }
}
