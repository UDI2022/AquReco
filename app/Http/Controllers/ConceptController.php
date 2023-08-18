<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class ConceptController extends Controller{
    public function Concept()
    {
        return Inertia::render('Concept');
    }
}