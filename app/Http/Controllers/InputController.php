<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class InputController extends Controller{
    public function Input()
    {
        return Inertia::render('Input');
    }
}