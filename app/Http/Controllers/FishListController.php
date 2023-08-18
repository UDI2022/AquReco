<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class FishListController extends Controller{
    public function FishList()
    {
        return Inertia::render('FishList');
    }
}