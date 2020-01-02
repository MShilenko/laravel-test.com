<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Str;

class CreateSlug
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
        $input = $request->all();

        if(empty($input['slug'])){
            $input['slug'] = Str::slug($input['title']);
            $request->merge(['slug' =>  $input['slug']]);
        }

        return $next($request);
    }
}
