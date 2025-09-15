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
        if (! $request->expectsJson()) {
            // 👉 Tu peux soit rediriger vers l'accueil
            return url('/');

            // 👉 OU, si c'est une API, tu peux renvoyer null
            // ce qui forcera Laravel à répondre par défaut avec une erreur 401 JSON
            // return null;
        }
    }
}
