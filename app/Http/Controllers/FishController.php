<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Fish\Fish;

class FishController extends Controller{
    public function Fish()
    {
        return Inertia::render('Fish');
    }
    public function FishAll(Request $request)
    {
        $fishall = Fish::with('species', 'caution', 'ph', 'feed')->get();
        // dump($fishall);

    
        return response()->json($fishall);
    }
    public function filterFish(Request $request)
    {
        $category = $request->input('category');
        $filteredFish = Fish::where('category', $category)->with('species', 'caution', 'ph', 'feed')->get();
        // dump($filteredFish);
        return Inertia::render('Fish', ['fishes' => $filteredFish]);

    }
}