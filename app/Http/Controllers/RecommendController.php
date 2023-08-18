<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class RecommendController extends Controller{
    public function Recommend()
    {
        return Inertia::render('Recommend');
    }
}