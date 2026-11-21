<?php

namespace App\Http\Controllers;

use App\Models\User;

class ProfileController extends Controller
{
    public function index()
    {
        $profile = User::first();

        return view('profile', compact('profile'));
    }
}
