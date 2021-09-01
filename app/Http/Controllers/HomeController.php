<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Chef;
use App\Models\Food;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
        if(!auth()->user()){
            return view('restaurant.home',compact("food","chefs"));
        }
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
    public function addCarts(Request $request,$id){
        $user_Id=auth()->user()->id;
        $food_Id=$id;
        $quantity=$request->quantity;
        Cart::create(["user_id"=>$user_Id,"food_id"=>$food_Id,"quantity"=>$quantity]);
        return redirect()->back();
    }
    public function showCarts(){
        $carts=Cart::where("user_id",auth()->user()->id)->join("food","carts.food_id","=","food.id")->get();
        return view("restaurant.carts",compact("carts"));
    }
    public function removeCarts($id){
       Cart::where("user_id",auth()->user()->id)->where("food_id",$id)->first()->delete();
       return redirect()->back();
    }
    public function increaseCarts($id){
        Cart::where("user_id",auth()->user()->id)->where("food_id",$id)->increment('quantity',1);
       return redirect()->back();
    }
    public function decreaseCarts($id){
        $cart=Cart::where("user_id",auth()->user()->id)->where("food_id",$id);
        if($cart->first()->quantity<2){
            $this->removeCarts($id);
            return redirect()->back();
        }
        $cart->decrement('quantity',1);
        return redirect()->back();
    }
}
