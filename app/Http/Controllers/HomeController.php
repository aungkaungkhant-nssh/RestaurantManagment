<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class HomeController extends Controller
{
    public function index(){
        return view('restaurant.home');
    }
    public function redirect(){
        
        if(Gate::allows("is-Admin-Or-Manager")){
            return redirect(route('admin.pannel'));
        }else{
            return redirect("/");
        }
    }
}
