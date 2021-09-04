<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChefsRequest;
use App\Http\Requests\OrderRequest;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\ReservationRequest;
use App\Models\Cart;
use App\Models\Chef;
use App\Models\Food;
use App\Models\Order;
use App\Models\Order_Item;
use App\Models\Reservation;
use App\Models\User;
use Carbon\Carbon;
use DateTime;
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
    public function chefLists(){
        $chefs=Chef::all();
        return view("admin.chefs.cheflists",compact("chefs"));
    }
    public function chefDelete($id){
        Chef::find($id)->delete();
        return redirect()->back()->with("success","Chef Delete Success");
    }
    public function chefEdit($id){
        $chef=Chef::find($id);
        return view("admin.chefs.chefedit",compact("chef"));
    }
    public function chefUpdate(Request $request,$id){
        $chef=Chef::find($id);
        if($request->hasFile("image")){
            $fileNameWithExt=$request->file("image")->getClientOriginalName();
            $filename=pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            $extension=$request->file("image")->getClientOriginalExtension();
            $fileNameToStore=$filename."_".time().".".$extension;
            $path=$request->file('image')->storeAs("public/chefsImage/",$fileNameToStore);
            //delete orginal file
            Storage::delete('public/chefsImage/'.$chef->image);
            $chef->image=$fileNameToStore;
        }
        $chef->name=$request->name;
        $chef->speciality=$request->speciality;
        $chef->save();
        return redirect(route("admin.cheflists"));
    }
    public function reservations(Request $request){
       Reservation::create($request->except("_token"));
       return redirect()->back();
    }
    public function reservationLists(){
        $reservation=Reservation::paginate(4);
        return view("admin.reservation.reservationlists",compact("reservation"));
    }
    public function orderNow(OrderRequest $request){
        $order=Order::create([
            "name"=>$request->name,
            "email"=>$request->email,
            "phone"=>$request->phone,
            "address"=>$request->address,
            "date"=>Carbon::now()->format('d-m-Y')
        ]);
        $order_Id=$order->id;
        foreach($request->foodid as $key=>$id){
             Order_Item::create([
            "order_id"=>$order_Id,
            "food_id"=>$request->foodid[$key],
            "quantity"=>$request->quantity[$key],
            "date"=>Carbon::now()->format('d-m-Y')
            ]);
        }
        Cart::where("user_id",auth()->user()->id)->delete();
        return view("restaurant.thank");
    }
    public function orderLists(){
        $today=Carbon::now()->format("d-m-Y");
        $orders=Order::paginate(3);
        $items=Order_Item::Join("food","order__items.food_id","=","food.id")->get();
        return view("admin.orders.orderlists",compact("items","orders","today"));
    }
    public function adminDashboard(){
        $today=Carbon::now()->format("d-m-Y");
        $dailyOrderTotal=Order::where("date",$today)->count();
        $dailyReservationTotal=Reservation::where("date",$today)->count();
        $userTotal=User::count();
        $foodTotal=Food::count();
        $chefTotal=Chef::count();
        $orderItems=Order_Item::where("date",$today);
        $dailySaleFoodQuantity=$orderItems->pluck("quantity")->reduce(function($item,$sale){
            return $item+$sale;
        });
        $items=$orderItems->join("food","order__items.food_id","=","food.id")->get();
        $dailyIncome=0;
        foreach($items as $item){
            $dailyIncome+=$item->price*$item->quantity;
        }
        $all_items=Order_Item::Join("food","order__items.food_id","=","food.id")->get();
        $salePrice=0;
        foreach($all_items as $item){
            $salePrice+=$item->price*$item->quantity;
        }
        return view("admin.dashboard.dashboard",compact("dailyOrderTotal","dailyReservationTotal","userTotal","foodTotal","chefTotal","dailySaleFoodQuantity","dailyIncome","salePrice"));
    }
}
