<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;
use Inertia\Inertia;

class TestController extends Controller
{
    public function test()
    {
        $tests = Test::all();

        return Inertia::render('Test', [
            'tests' => $tests
        ]);
    }
}