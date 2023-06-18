<?php

namespace App\Http\Controllers;

use App\Models\Disaster;
use App\Models\DisasterCategory;
use App\Models\Subdistrict;
use Illuminate\Http\Request;

class DashboardDisasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.disasters.index', [
            'title' => 'Kebencanaan',
            'disasters' => Disaster::with('disasterCategory', 'subdistrict')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.disasters.create', [
            'title'=> 'Create',
            'disasterCategories' => DisasterCategory::all(),
            'subdistrict' => Subdistrict::all()
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Disaster  $disaster
     * @return \Illuminate\Http\Response
     */
    public function show(Disaster $disaster)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Disaster  $disaster
     * @return \Illuminate\Http\Response
     */
    public function edit(Disaster $disaster)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Disaster  $disaster
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Disaster $disaster)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Disaster  $disaster
     * @return \Illuminate\Http\Response
     */
    public function destroy(Disaster $disaster)
    {
        //
    }
}
