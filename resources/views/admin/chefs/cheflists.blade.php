@extends('admin.layout')
@section('content')
<div class="container mt-3">
    <h1 class="text-center mb-3" style="font-size: 35px">Chef Lists</h1>
     <table class="table table-striped mb-3">
        <thead>
            <tr>
                <th>Name</th>
                <th>Speciality</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($chefs as $chef)
                <tr>
                    <td>{{$chef->name}}</td>
                    <td>{{$chef->speciality}}</td>
                    <td>
                        <img src="{{asset("storage/chefsImage/$chef->image")}}" alt="" style="width:70px;height:70px;">
                    </td>
                    <td>
                        <a href="" class="btn btn-danger"
                        onclick="
                            event.preventDefault();
                            const con=confirm('Are You Sure Want To Delete');
                            if(con){
                                document.getElementById('chefdelete-{{$chef->id}}').submit()
                            }
                        "
                        >Delete</a>
                        <a href="{{route('admin.chefedit',$chef->id)}}" class="btn btn-primary">Edit</a>
                    </td>
                    <form action="{{route("admin.chefdelete",$chef->id)}}" method="POST" id="chefdelete-{{$chef->id}}">
                        @csrf
                        @method("DELETE")
                    </form>
                </tr>
            @endforeach
            
        </tbody>
     
     </table>
 </div>
@endsection