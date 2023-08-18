<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class MeasureController extends Controller{
    public function Measure()
    {
        return Inertia::render('Measure');
    }
}