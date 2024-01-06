<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        // Jika request tidak mengharapkan respons JSON
        if (! $request->expectsJson()) {
            // Arahkan pengguna ke rute 'login'
            return route('login');
        }
        // Jika request mengharapkan respons JSON, null akan dikembalikan,
        // yang biasanya diikuti oleh respons 401 Unauthorized secara default.
    }
}