<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Role;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Authorization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $role = Role::find(auth()->user()->role->role_id);
        foreach ($role->feature as $feature) {
            if($feature->route_prefix_name == request()->segment(3)){
                return $next($request);
            }
        }
        return abort(403,'Anda Tidak Memiliki Akses Ke Halaman Ini');
    }
}
