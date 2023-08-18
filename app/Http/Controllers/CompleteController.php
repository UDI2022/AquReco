<?php
namespace App\Http\Controllers;

use App\Models\Contact\Confirm;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CompleteController extends Controller
{
    public function store(Request $request)
    {
        // バリデーション等の必要な処理を行うことがあれば行います

        // データをcontactsテーブルに保存
        $contact = Confirm::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'inquiry' => $request->input('inquiry'),
        ]);
        
        return Inertia::render('Complete'); 
    }
}