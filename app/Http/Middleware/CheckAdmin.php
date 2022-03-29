<?php

namespace App\Http\Middleware;

use Closure;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!($request->user() && $request->user()->isAdmin())){
            abort(404);
            //ログインしているユーザーであること かつ ユーザーが管理者権限を持っていなければ404
            //!は否定
        }
        return $next($request);
    }
} 