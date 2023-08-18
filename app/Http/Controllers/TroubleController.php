<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class TroubleController extends Controller{
    public function Trouble()
    {
        return Inertia::render('Trouble');
    }
}