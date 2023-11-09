<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        Alert::info('Login terlebih dahulu','');
        return $request->expectsJson() ? null : route('login');
        // return $request->expectsJson() ? null : abort(404);
    }
}
