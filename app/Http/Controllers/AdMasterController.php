<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class AdMasterController extends Controller{
    public function AdMaster()
    {
        return Inertia::render('AdMaster');
    }
}