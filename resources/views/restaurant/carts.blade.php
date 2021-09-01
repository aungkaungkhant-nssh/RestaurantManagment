@include('restaurant.cssrestaurant')  
<div class="container text-center my-5">
    <div class="d-flex justify-content-between align-items-center mb-4" style="width: 600px">
        <div>
            <a href="/">Back To shop</a>
        </div>
       <div>
            <h2>Cart Lists</h2>
       </div>
      
    </div>
    <table class="table table-striped">
       
        <thead>
            <tr>
                <th>Title</th>
                <th>Price</th>
                <th>Image</th>
                <th>Quantity</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($carts as $cart)
                <tr>
                    <td>{{$cart->title}}</td>
                    <td>{{$cart->price}}</td>
                    <td>
                        <img src="{{asset("storage/productsImage/$cart->image")}}" alt="" style="width:70px;height:70px;">
                    </td>
                    <td class="d-flex align-items-center justify-content-center">
                        <h5>{{$cart->quantity}}</h5>
                        <div class="ml-3">
                            <a href="{{route("home.increasecarts",$cart->id)}}" style="display: block">
                                <i class="fas fa-chevron-up" style="cursor: pointer"></i>
                            </a>
                               
                            <a href="{{route("home.decreasecarts",$cart->id)}}" style="display: block">
                                <i class="fas fa-chevron-down" style="cursor: pointer"></i>
                            </a>
                        </div>
                       
                    </td>
                    <td><a href="{{route('home.removecarts',$cart->id)}}" class="btn btn-danger">Remove Cart</a></td>
                </tr>
            @endforeach
            
        </tbody>
    </table>
</div>
@include('restaurant.scriptrestaurant')  