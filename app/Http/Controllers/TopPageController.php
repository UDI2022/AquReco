<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class TopPageController extends Controller{
    public function Toppage()
    {
        return Inertia::render('TopPage');
    }
}