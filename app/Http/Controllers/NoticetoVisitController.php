<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class NoticetoVisitController extends Controller{
    public function NoticetoVisit()
    {
        return Inertia::render('NoticetoVisit');
    }
}