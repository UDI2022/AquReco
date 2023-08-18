<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Admin\AdContact;

class ContactController extends Controller
{
    public function contact()
    {
        return Inertia::render('Contact');
    }

    public function adcontact()
    {
        $contacts = AdContact::all();
        return response()->json($contacts);
    }

}
