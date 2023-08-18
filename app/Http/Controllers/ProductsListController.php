<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductsListController extends Controller{
    public function ProductsList()
    {
        return Inertia::render('ProductsList');
    }
}