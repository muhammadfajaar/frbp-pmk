<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class DashboardContactController extends Controller
{
    public function index()
    {
        return view('dashboard.contacts.index', [
            'title' => 'Aspirasi',
            'contacts' => Contact::all()
        ]);
    }
}
