<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ManageController extends Controller
{
    public function Manage_User_List() {
        $user = User::with('Roles')->get();
        //dd($user);
        return view('pages.manage_user', compact('user'));
    }
}
