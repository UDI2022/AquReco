<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Admin\AdContact;

class AdContactController extends Controller{
    public function AdContact()
    {
        return Inertia::render('AdContact');
    }


    public function update(Request $request, AdContact $contact)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'inquiry' => 'required| string',
                
        ]);
        $contact->update($request->only('name', 'email', 'inquiry'));
        return response()->json($contact);
    }

    public function destroy(AdContact $contact)
    {
        $contact->delete();
        return response()->json(['message'=> '削除しました。']);
    }
}
