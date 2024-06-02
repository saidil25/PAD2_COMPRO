<?php

namespace App\Http\Middleware;

use App\Models\Carousel;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CarouselOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $currentUser = Auth::user();
        $carousel = Carousel::findOrFail($request->id);

        if($carousel->author_id != $currentUser->id) {
            return response()->json(['messege' => 'Data Not Foud'], 404);
        }

        return $next($request);
    }
}
