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
    <button class="btn btn-success" id="order">Order</button>
    <div style="width: 350px;margin:30px auto;display:none;" id="orderNow">
    <form action="{{route('home.ordernow')}}" method="POST">
         @csrf
            <div class="form-group">
                @foreach ($carts as $cart)
                    <input type="hidden" value="{{$cart->food_id}}" name="foodid[]">
                    <input type="hidden" value="{{$cart->quantity}}" name="quantity[]">
                @endforeach
                  <input type="text" name="name" class="form-control" placeholder="Name">
                  @error('name')
                    <p class="text-danger">{{ $message }}</p>
                 @enderror
            </div>
            <div class="form-group">
                <input type="text" name="email" class="form-control" placeholder="Email">
                @error('email')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <input type="text" name="phone" class="form-control" placeholder="Phone">
                @error('phone')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
          <div class="form-group">
                <textarea name="address" placeholder="Address" class="form-control"></textarea>  
                @error('address')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
          </div>
          <input type="submit" value="Order Now" class="btn btn-success">
       </form>
    </div>
     
</div>
@include('restaurant.scriptrestaurant')  