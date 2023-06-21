<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    public function index()
    {
        return view('agenda', [
            'title' => 'Agenda',
            'active' => 'agenda',
            'agendas' => Agenda::all()
        ]);
    }
}
