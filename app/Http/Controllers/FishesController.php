<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class FishesController extends Controller{
    public function Fishes()
    {
        return Inertia::render('Fishes');
    }
}