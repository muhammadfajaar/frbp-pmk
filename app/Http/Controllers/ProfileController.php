<?php

namespace App\Http\Controllers;

use App\Models\Profile;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile', [
            'title' => 'Profil',
            'active' => 'profiles',
            'profile' => Profile::all()
        ]);
    }

    public function show(Profile $profile)
    {
        // return view('profile', [
        //     'title' => 'Detail Profil',
        //     'active' => 'profile',
        //     'profile' => $profile
        // ]);
    }
}
