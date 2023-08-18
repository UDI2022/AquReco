<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class LayoutController extends Controller{
    public function Layout()
    {
        return Inertia::render('Layout');
    }
}