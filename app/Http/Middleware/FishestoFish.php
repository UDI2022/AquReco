<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FishestoFish
{   
    public function handle(Request $request, Closure $next)
    {
        $fishall = $request->attributes->get('fishall');
    
        if (!$fishall->count()) {
            return response('No fish data found.', 404);
        }
    
        return $next($request);
    }
    
}
