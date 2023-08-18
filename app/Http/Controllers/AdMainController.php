<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class AdMainController extends Controller{
    public function AdMain()
    {
        return Inertia::render('AdMain');
    }
}