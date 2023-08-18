<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class MainController extends Controller{
    public function Main()
    {
        return Inertia::render('Main');
    }
}