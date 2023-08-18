<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class AdProductsController extends Controller{
    public function AdProducts()
    {
        return Inertia::render('AdProducts');
    }
}