<?php

namespace App\Http\Middleware;

use App\Models\Cart;
use Closure;
use Illuminate\Http\Request;

class UserAndCartCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {   
      
        if($request->user()){
            $cart=Cart::where("user_id",$request->user()->id)->first();
            if($cart){
                return $next($request);
            }else{
                return redirect()->back();
            }
            
        }
        return redirect()->back();
      
    }
}
