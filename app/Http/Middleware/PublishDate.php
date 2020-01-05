<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;

class PublishDate
{
	const PUBLISHED = 1;
	const NOT_PUBLISHED = 0;
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

        if($input['is_published'] == self::NOT_PUBLISHED){
        	$input['published_at'] = null;
        }elseif($input['is_published'] == self::PUBLISHED && $input['published_at'] == null){
        	$input['published_at'] = Carbon::now();
        }

         if($input['published_at'] != $request->published_at){
            $request->merge(['published_at' =>  $input['published_at']]);
        }

        return $next($request);
    }
}
