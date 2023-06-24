<?php

namespace App\Http\Controllers;

use App\Models\Disaster;
use App\Models\DisasterCategory;
use App\Models\Subdistrict;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;

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
            'title' => 'Kebencanaan',
            'disasterCategories' => DisasterCategory::all(),
            'subdistricts' => Subdistrict::all()
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
            'disaster_category_id' => 'required',
            'subdistrict_id' => 'required',
            'penyebab' => 'required|max:255',
            'slug' => 'required|unique:disasters',
            'location' => 'required',
            'hilang' => 'sometimes|required',
            'meninggal_dunia' => 'sometimes|required',
            'mengungsi' => 'sometimes|required',
            'luka_luka' => 'sometimes|required',
            'rumah_rusak_ringan' => 'sometimes|required',
            'rumah_rusak_sedang' => 'sometimes|required',
            'rumah_rusak_berat' => 'sometimes|required',
            'rumah_terendam' => 'sometimes|required',
            'fas_pendidikan' => 'sometimes|required',
            'fas_ibadah' => 'sometimes|required',
            'fas_kesehatan' => 'sometimes|required',
            'fas_umum' => 'sometimes|required',
            'waktu' => 'required'
        ]);

        Disaster::create($validatedData);

        return redirect('/dashboard/disasters')->with('success', 'Kebencannan baru berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Disaster  $disaster
     * @return \Illuminate\Http\Response
     */
    public function show(Disaster $disaster)
    {
        return view('dashboard.disasters.show', [
            'title' => 'Kebencanaan',
            'disaster' => $disaster,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Disaster  $disaster
     * @return \Illuminate\Http\Response
     */
    public function edit(Disaster $disaster)
    {
        return view('dashboard.disasters.edit', [
            'title' => 'Kebencanaan',
            'disaster' => $disaster,
            'disasters' => Disaster::all(),
            'disasterCategories' => DisasterCategory::all(),
            'subdistricts' => Subdistrict::all()
        ]);
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
        $rules = [
            'disaster_category_id' => 'required',
            'subdistrict_id' => 'required',
            'penyebab' => 'required|max:255',
            'location' => 'required',
            'hilang' => 'sometimes|required',
            'meninggal_dunia' => 'sometimes|required',
            'mengungsi' => 'sometimes|required',
            'luka_luka' => 'sometimes|required',
            'rumah_rusak_ringan' => 'sometimes|required',
            'rumah_rusak_sedang' => 'sometimes|required',
            'rumah_rusak_berat' => 'sometimes|required',
            'rumah_terendam' => 'sometimes|required',
            'fas_pendidikan' => 'sometimes|required',
            'fas_ibadah' => 'sometimes|required',
            'fas_kesehatan' => 'sometimes|required',
            'fas_umum' => 'sometimes|required',
            'waktu' => 'required|max:10'
        ];

        if ($request->slug != $disaster->slug) {
            $rules['slug'] = 'required|unique:disasters';
        }

        $validatedData = $request->validate($rules);
        Disaster::where('id', $disaster->id)
            ->update($validatedData);

        return redirect('/dashboard/disasters')->with('success', 'Kebencanaan berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Disaster  $disaster
     * @return \Illuminate\Http\Response
     */
    public function destroy(Disaster $disaster)
    {
        Disaster::destroy($disaster->id);
        return redirect('/dashboard/disasters')->with('success', 'Kebencanaan berhasi dihapus!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Disaster::class, 'slug', $request->penyebab);
        return response()->json(['slug' => $slug]);
    }
}
