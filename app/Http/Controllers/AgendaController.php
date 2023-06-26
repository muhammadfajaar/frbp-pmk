<?php

namespace App\Http\Controllers;

use App\Models\Agenda;

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
