<?php

namespace App\Http\Middleware;

use Closure;
use App\News;
use Illuminate\Support\Facades\DB;

class PremiumCheck
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
        $id = $request->id;
        $news_user_id = DB::table('news')
                    ->where('id','=',$id)
                    ->select('user_id')
                    ->get();
                    
        if(auth()->user()->isPremium == 1 || auth()->user()->isPremium == $news_user_id[0]->user_id || auth()->user()->isAdmin == 1)
        {
            return $next($request);
        }
        else{
            return redirect()->route('home_page')->with('error','You are not premium user!');
        }
        
    }
}
