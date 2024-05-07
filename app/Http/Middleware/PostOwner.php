<?php

namespace App\Http\Middleware;

use App\Models\Catalog;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class PostOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $currentUser = Auth::user();
        $catalog = Catalog::findOrFail($request->id);

        if($catalog->author_id != $currentUser->id) {
            return response()->json(['messege' => 'Data Not Foud'], 404);
        }

        return $next($request);
    }
}
