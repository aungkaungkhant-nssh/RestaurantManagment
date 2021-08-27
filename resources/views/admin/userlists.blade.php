@extends('admin.layout')
@section('content')
     <div class="container mt-3">
        <h1 class="text-center mb-3" style="font-size: 35px">User Lists</h1>
         <table class="table table-striped mb-3">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            @if($user->roles->first()->name==="Admin" || Auth::user()->id===$user->id)
                              @else
                              <a href="" class="btn btn-danger" 
                              onclick="
                              event.preventDefault();
                              const con=confirm('Are you sure want to delete');
                              if(con){
                                  document.getElementById('delete-{{$user->id}}').submit()
                              }
                              "
                              >
                              Delete
                            </a>
                            <form action="{{route('admin.userdelete',$user->id)}}" id="delete-{{$user->id}}" method="POST">
                                @csrf
                                @method("DELETE")
                            </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
                
            </tbody>
         
         </table>
         {{$users->links()}}
     </div>
@endsection