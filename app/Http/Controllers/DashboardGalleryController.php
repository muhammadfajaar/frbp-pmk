<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\GalleryCategory;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;

class DashboardGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $galleries = Gallery::with('galleryCategory');

        if ($search) {
            $galleries = $galleries->where('description', 'LIKE', '%' . $search . '%');
        }

        $galleries = $galleries->orderBy('id', 'desc')->paginate(6)->withQueryString();

        $no = ($galleries->currentPage() - 1) * $galleries->perPage();

        return view('dashboard.galleries.index', [
            'title' => 'Galeri',
            'galleries' => $galleries,
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
        return view('dashboard.galleries.create', [
            'title' => 'Galeri',
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
            'description' => 'required|max:255',
            'slug' => 'required|unique:galleries',
            'gallery_category_id' => 'required',
            'image' => 'image|file|max:1024',
        ]);

        if ($request->file('image')) {
            $validateData['image'] = $request->file('image')->store('post-images');
        }

        $validateData['user_id'] = auth()->user()->id;

        Gallery::create($validateData);

        return redirect('/dashboard/galleries')->with('success', 'Data galeri baru berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {
        return view('dashboard.galleries.show', [
            'title' => 'Galeri',
            'gallery' => $gallery
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallery $gallery)
    {
        return view('dashboard.galleries.edit', [
            'title' => 'Galeri',
            'gallery' => $gallery,
            'galleryCategories' => GalleryCategory::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gallery $gallery)
    {
        $rules = [
            'description' => 'required|max:255',
            'gallery_category_id' => 'required',
            'image' => 'image|file|max:1024',
        ];

        if ($request->slug != $gallery->slug) {
            $rules['slug'] = 'required|unique:galleries';
        }

        $validateData = $request->validate($rules);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validateData['image'] = $request->file('image')->store('post-images');
        }

        Gallery::where('id', $gallery->id)
            ->update($validateData);

        return redirect('/dashboard/galleries')->with('success', 'Data galeri berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallery $gallery)
    {
        if ($gallery->image) {
            Storage::delete($gallery->image);
        }
        Gallery::destroy($gallery->id);
        return redirect('/dashboard/galleries')->with('success', 'Data galeri berhasil dihapus!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Gallery::class, 'slug', $request->description);
        return response()->json(['slug' => $slug]);
    }
}
