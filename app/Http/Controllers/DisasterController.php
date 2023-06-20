<?php

namespace App\Http\Controllers;

use App\Models\Disaster;
use Illuminate\Http\Request;

class DisasterController extends Controller
{
    public function index()
    {
        $title = '';
        
        return view('disaster', [
            'title' => 'Data Bencana' . $title,
            'active' => 'disaster',
            'disasters' => Disaster::all()
        ]);
    }
}
