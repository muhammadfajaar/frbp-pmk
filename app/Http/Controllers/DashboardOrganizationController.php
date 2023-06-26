<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;

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
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function edit(Organization $organization)
    {
        return view('dashboard.organizations.edit', [
            'title' => 'Organisasi',
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
            'chairman_name' => 'required|max:255',
            'notelp' => 'required|max:20',
            'email' => 'required|max:255',
            'address' => 'required|max:255',
            'image' => 'image|file|max:1024',
            'maps_link' => 'sometimes|required'
        ];

        if ($request->slug != $organization->slug) {
            $rules['slug'] = 'required|unique:organizations';
        }

        $validatedData = $request->validate($rules);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        $organization->update($validatedData);

        return redirect('/dashboard/organizations')->with('success', 'Data Organisasi Berhasil diubah!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Organization::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }
}
