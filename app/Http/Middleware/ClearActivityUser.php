<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Factory as Auth;

class ClearActivityUser
{
    /**
    * The authentication factory instance.
    *
    * @var \Illuminate\Contracts\Auth\Factory
    */
    protected $auth;

    /**
    * Create a new middleware instance.
    *
    * @param  \Illuminate\Contracts\Auth\Factory  $auth
    * @return void
    */
    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($this->auth->check()) {
            $user = $this->auth->user();
            $user->last_activity = new \DateTime;
            $user->timestamps = false;
            $user->save();
        }
        return $next($request);
    }
}
