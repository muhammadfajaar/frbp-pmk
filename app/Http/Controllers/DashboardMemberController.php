<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;


class DashboardMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $members = Member::query();
        
        if ($search) {
            $members = $members->where('name', 'LIKE', '%' . $search . '%');
        }
        
        $members = $members->orderBy('id', 'desc')->paginate(6)->withQueryString();
        
        $no = ($members->currentPage() - 1) * $members->perPage();
        
        return view('dashboard.members.index', [
            'title' => 'Anggota',
            'allMembers' => Member::all(),
            'members' => $members,
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
        return view('dashboard.members.create', [
            'title' => 'Anggota',
            'members' => Member::all()
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
            'name' => 'required',
            'slug' => 'required|unique:members',
            'address' => 'required',
            'phone_number' => 'required',
            'email' => 'required|email',
            'date_birth' => 'required',
            'gender' => 'required',
            'marital_status' => 'required',
            'work' => 'required',
            'date_joined' => 'required',
            'image' => 'image|file|max:1024'
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        Member::create($validatedData);

        return redirect('/dashboard/members')->with('success', 'Data anggota baru berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        return view('dashboard.members.show', [
            'title' => 'Anggota',
            'member' => $member
         ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        return view('dashboard.members.edit', [
            'title' => 'Anggota',
            'member' => $member,
            'members' => Member::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
        $rules = [
            'name' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
            'email' => 'required|email',
            'date_birth' => 'required',
            'gender' => 'required',
            'marital_status' => 'required',
            'work' => 'required',
            'date_joined' => 'required',
            'image' => 'image|file|max:1024'
        ];

        if ($request->slug != $member->slug) {
            $rules['slug'] = 'required|unique:members';
        }

        $validateData = $request->validate($rules);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validateData['image'] = $request->file('image')->store('post-images');
        }

        Member::where('id', $member->id)
            ->update($validateData);

        return redirect('/dashboard/members')->with('success', 'Data anggota berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        Member::destroy($member->id);
        return redirect('/dashboard/members')->with('success', 'Anggota berhasil dihapus!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Member::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }
}
