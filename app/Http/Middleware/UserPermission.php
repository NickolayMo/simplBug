<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class UserPermission
{
    protected $auth;

    public function __construct(Guard $auth){
        $this->auth = $auth;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $permissions)
    {
        if($this->auth->check()){
            if(!$this->auth->user()->can($permissions)){
                if($request->ajax()){
                    return response('Unauthorized', 403);
                }
                abort(403, 'Unauthorized action');
            }

        }       

        return $next($request);
    }
}
