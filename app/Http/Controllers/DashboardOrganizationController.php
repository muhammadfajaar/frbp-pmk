<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardOrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.organizations.index', [
            'title' => 'Organisasi',
            'organizations' => Organization::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Models\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function show(Organization $organization)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function edit(Organization $organization)
    {
        return view('dashboard.organizations.edit', [
            'title' => 'Edit Organisasi',
            'organization' => $organization,
            'organizations' => Organization::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Organization $organization)
    {
        $rules = [
            'name' => 'required|max:255',
            'short_name' => 'required|max:50',
            'charmain_name' => 'required|max:255',
            'notelp' => 'required|max:20',
            'email' => 'required|max:255',
            'address' => 'required|max:255',
            'maps_link' => 'nullable|url'
        ];

        if($request->slug != $organization->slug) {
            $rules['slug'] = 'required|unique:organizations';
        }

        $validatedData = $request->validate($rules);

        Organization::where('id', $organization->id)
            ->update($validatedData);

        return redirect('/dashboard/organizations')->with('success', 'Organization has beed updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function destroy(Organization $organization)
    {
        //
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Organization::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }
}
