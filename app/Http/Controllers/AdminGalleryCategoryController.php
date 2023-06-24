<?php

namespace App\Http\Controllers;

use App\Models\GalleryCategory;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class AdminGalleryCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('admin');
        return view('dashboard.gallery_categories.index', [
            'title' => 'Kategori',
            'galleryCategories' => GalleryCategory::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.gallery_categories.create', [
            'title' => 'Kategori',
            'galleryCategories' => GalleryCategory::all()
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
        $validateData = $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:gallery_categories'
        ]);
        
        GalleryCategory::create($validateData);

        return redirect('/dashboard/gallery_categories')->with('success', 'Data kategori baru berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GalleryCategory  $galleryCategory
     * @return \Illuminate\Http\Response
     */
    public function show(GalleryCategory $galleryCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GalleryCategory  $galleryCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(GalleryCategory $galleryCategory)
    {
        return view('dashboard.gallery_categories.edit', [
            'title' => 'Kategori',
            'galleryCategory' => $galleryCategory,
            'galleryCategories' => GalleryCategory::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GalleryCategory  $galleryCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GalleryCategory $galleryCategory)
    {
        $rules = [
            'name' => 'required|max:255'
        ];

        if($request->slug != $galleryCategory->slug) {
            $rules['slug'] = 'required|unique:gallery_categories';
        }
        $validatedData = $request->validate($rules);

        GalleryCategory::where('id', $galleryCategory->id)
            ->update($validatedData);

        return redirect('/dashboard/gallery_categories')->with('success', 'Data kategory berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GalleryCategory  $galleryCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(GalleryCategory $galleryCategory)
    {
        GalleryCategory::destroy($galleryCategory->id);
        return redirect('/dashboard/gallery_categories')->with('success', 'Data kategori berhasil dihapus!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(GalleryCategory::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }
}
