@extends('admin.layout')
@section('content')
<div class="container">
    <h1 class="text-center mb-4" style="font-size: 35px">Order Lists</h1>
    @foreach ($orders as $order)
    <div class="d-flex justify-content-around" style="border: 2px solid #fff;padding:20px 0px;margin-bottom:15px;">
        <div>
            <h1 class="mb-3">{{$order->name}}</h1>
            <h3 class="mb-3">{{$order->email}}</h3>
            <h5 class="mb-3">{{$order->address}}</h5>
        </div>
        <div>
            @php
                $total=0;
             @endphp
            @foreach ($items as $item)
                @if($order->id===$item->order_id)
                    @php
                    $total+=$item->price*$item->quantity;  
                    @endphp
                    <div>
                        <p class="mb-4" style="color:#2980b9;display:inline-block">{{$item->title}}</p>
                        <span class="mx-2" style="background-color: red;border-radius:50%;padding:5px 10px;">{{$item->quantity}}</span>
                        <b>${{$item->price}}</b>
                    </div>
                @endif
             @endforeach
        </div>
         <div>
             <h3>Total Amount: <span style="font-style: italic;" class="ml-2">${{$total}}</span></h3>
         </div>
    </div>
@endforeach
{{$orders->links()}}
</div>



@endsection