<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class DashboardContactController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $contacts = Contact::query();

        if ($search) {
            $contacts = $contacts->where('name', 'LIKE', '%' . $search . '%');
        }

        $contacts = $contacts->orderBy('id', 'desc')->paginate(6)->withQueryString();

        $no = ($contacts->currentPage() - 1) * $contacts->perPage();

        return view('dashboard.contacts.index', [
            'title' => 'Aspirasi',
            'allContacts' => Contact::all(),
            'contacts' => $contacts,
            'search' => $search,
            'no' => $no
        ]);
    }

    public function destroy(Contact $contact)
    {
        Contact::destroy($contact->id);
        return redirect('/dashboard/contacts')->with('success', 'Pesan aspirasi berhasil dihapus!');
    }
}
