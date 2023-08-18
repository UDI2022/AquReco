<?php
use Inertia\Inertia;

class HomeController extends Controller{
    public function index(){
        // Route for mainpage
        return Inertia::render('MainPage');
    }
}