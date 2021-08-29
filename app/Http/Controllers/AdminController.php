<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChefsRequest;
use App\Http\Requests\ProductRequest;
use App\Models\Chef;
use App\Models\Food;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
    public function foodAdd(){
        return view("admin.food.foodadd");
    }
    public function foodStore(ProductRequest $request){
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
    public function foodLists(){
        $food=Food::paginate(4);
       return view("admin.food.foodlists",compact("food"));
    }
    public function foodDelete($id){
       $food=Food::find($id);
       $food->delete();
       return redirect()->back()->with("success","Food Delete Success");
    }
    public function foodEdit($id){
        $food=Food::find($id);
        return view('admin.food.foodedit',compact("food"));
    }
    public function foodUpdate(Request $request,$id){
        $food=Food::find($id);
        if($request->hasFile("image")){
            $fileNameWithExt=$request->file("image")->getClientOriginalName();
            $filename=pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            $extension=$request->file("image")->getClientOriginalExtension();
            $fileNameToStore=$filename."_".time().".".$extension;
            $path=$request->file('image')->storeAs("public/productsImage/",$fileNameToStore);
            //delete orginal file
            Storage::delete('public/productsImage/'.$food->image);
            $food->image=$fileNameToStore;
        }
        $food->title=$request->title;
        $food->price=$request->price;
        $food->description=$request->description;
        $food->save();
        return redirect(route("admin.foodlists"));
    }
    public function chefsAdd(){
        return view("admin.chefs.chefsadd");
    }
    public function chefsStore(ChefsRequest $request){
        if($request->hasFile("image")){
            $fileNameWithExt=$request->file("image")->getClientOriginalName();
            $filename=pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            $extension=$request->file("image")->getClientOriginalExtension();
            $fileNameToStore=$filename."_".time().".".$extension;
            $request->file('image')->storeAs("public/chefsImage",$fileNameToStore);
        }
        Chef::create([
            "name"=>$request->name,
            "speciality"=>$request->speciality,
            "image"=>$fileNameToStore
        ]);
        return redirect()->back()->with("success","Add Chef Success");
    }
}
