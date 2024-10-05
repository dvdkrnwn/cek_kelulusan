<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    
    public function Profile () {
        $data = User::with('Roles')->where('id', Auth::user()->id)->first();
        return view('pages.profile', compact('data'));
    }
}
