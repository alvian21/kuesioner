<?php

namespace App\Http\Middleware;

use Closure;
use App\GuestBook;

class CheckData
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,...$name)
    {

        if(in_array($request->get('name'),$name)){
            return $next($request);

        }
        return redirect('/data/bukutamu');
    }
}
