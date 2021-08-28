@extends('admin.layout')
@section('content')
<div class="container mt-3">
    <h1 class="text-center mb-3" style="font-size: 35px">User Lists</h1>
     <table class="table table-striped mb-4">
        <thead>
            <tr>
                <th>Title</th>
                <th>Price</th>
                <th>Image</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($food as $f)
                <tr>
                    <td>{{$f->title}}</td>
                    <td>${{$f->price}}</td>
                    <td>
                        <img src="{{asset("storage/productsImage/$f->image")}}" alt="" style="width:70px;height:70px;">
                    </td>
                    <td>{{$f->description}}</td>
                    <td>
                        <a href="" class="btn btn-danger"
                        onclick="
                            event.preventDefault();
                            const con=confirm('Are You Sure Want To Delete');
                            if(con){
                                document.getElementById('fooddelete-{{$f->id}}').submit()
                            }
                        "
                        >Delete</a>
                        <a href="{{route('admin.foodedit',$f->id)}}" class="btn btn-primary">Edit</a>
                    </td>
                    <form action="{{route("admin.fooddelete",$f->id)}}" method="POST" id="fooddelete-{{$f->id}}">
                        @csrf
                        @method("DELETE")
                    </form>
                </tr>
            @endforeach
            
        </tbody>
     
     </table>
     {{$food->links()}}
 </div>
@endsection