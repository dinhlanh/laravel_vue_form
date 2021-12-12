<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Services\ContactService;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function create()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);

        $contact = ContactService::store($request->all());
        if (!$contact) {
            return [
                'error' => 'store fail',
            ];
        }
//        return ['success' => 'Contact Created'];
        return response()->json([
            'status' => 'susscess',
            'contact' => $contact
        ]);
    }
}
