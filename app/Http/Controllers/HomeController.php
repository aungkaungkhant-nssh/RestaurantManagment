<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Chef;
use App\Models\Food;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class HomeController extends Controller
{
    public function index(){
        $food=Food::all();
        $chefs=Chef::all();
        return view('restaurant.home',compact("food","chefs"));
    }
    public function redirect(){
        $food=Food::all();
        $chefs=Chef::all();
        $cart=Cart::where("user_id",auth()->user()->id)->get();
        $count=$cart->pluck("quantity")->reduce(function($carry,$item){
            return $carry+$item;
        });
        if(Gate::allows("is-Admin-Or-Manager")){
            return redirect(route('admin.pannel'));
        }else{

            return view("restaurant.home",compact("food","chefs","count"));
        }
    }
}
