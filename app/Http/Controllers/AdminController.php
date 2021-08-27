<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view("admin.index");
    }
    public function userLists(){
       $users=User::paginate(4);
        return view("admin.userlists",compact("users"));
    }
    public function userDelete($id){
        User::find($id)->delete();
        return redirect()->back();
    }   
}
