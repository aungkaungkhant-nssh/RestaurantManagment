<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Food;
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
        return redirect()->back()->with("success","Delete User Success");
    }   
    public function productsAdd(){
        return view("admin.products.productsadd");
    }
    public function productsStore(ProductRequest $request){
        if($request->hasFile("image")){
            $fileNameWithExt=$request->file("image")->getClientOriginalName();
            $filename=pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            $extension=$request->file("image")->getClientOriginalExtension();
            $fileNameToStore=$filename."_".time().".".$extension;
           $request->file('image')->storeAs("public/productsImage",$fileNameToStore);
        }
        Food::create(
            [
                "title"=>$request->title,
                "price"=>$request->price,
                "image"=>$fileNameToStore,
                "description"=>$request->description
            ],
        );
        return redirect()->back()->with("success","Food Add Success");
    }
}
