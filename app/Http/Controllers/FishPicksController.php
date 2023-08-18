<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class FishPicksController extends Controller{
    public function FishPicks()
    {
        return Inertia::render('FishPicks');
    }
}