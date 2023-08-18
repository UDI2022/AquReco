<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class AdCustomerController extends Controller{
    public function AdCustomer()
    {
        return Inertia::render('AdCustomer');
    }
}