<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardAgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $agendas = Agenda::where('activity', 'LIKE', '%' . $search . '%')
            ->orderBy('id', 'desc')
            ->paginate(6)
            ->withQueryString();

        $no = ($agendas->currentPage() - 1) * $agendas->perPage();

        return view('dashboard.agendas.index', [
            'title' => 'Agenda',
            'agendas' => $agendas,
            'search' => $search,
            'no' => $no
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.agendas.create', [
            'title' => 'Agenda',
            'agendas' => Agenda::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'date' => 'required',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'activity' => 'required|max:255',
            'slug' => 'required|unique:agendas',
            'location' => 'required|max:255',
            'image' => 'image|file|max:1024',
            'deskription' => 'required'
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        $validatedData['user_id'] = auth()->user()->id;

        Agenda::create($validatedData);

        return redirect('/dashboard/agendas')->with('success', 'Data agenda baru berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function show(Agenda $agenda)
    {
        return view('dashboard.agendas.show', [
            'title' => 'Agenda',
            'agenda' => $agenda
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function edit(Agenda $agenda)
    {
        return view('dashboard.agendas.edit', [
            'title' => 'Agenda',
            'agenda' => $agenda,
            'agendas' => Agenda::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agenda $agenda)
    {
        $rules = [
            'date' => 'required',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'activity' => 'required|max:255',
            'location' => 'required|max:255',
            'image' => 'image|file|max:1024',
            'deskription' => 'required'
        ];

        if ($request->slug != $agenda->slug) {
            $rules['slug'] = 'required|unique:agendas';
        }

        $validatedData = $request->validate($rules);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        $validatedData['user_id'] = auth()->user()->id;

        Agenda::where('id', $agenda->id)
            ->update($validatedData);

        return redirect('/dashboard/agendas')->with('success', 'Data agenda behasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agenda $agenda)
    {
        if ($agenda->image) {
            Storage::delete($agenda->image);
        }
        Agenda::destroy($agenda->id);
        return redirect('/dashboard/agendas')->with('success', 'Data agenda berhasi dihapus!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Agenda::class, 'slug', $request->activity);
        return response()->json(['slug' => $slug]);
    }
}
