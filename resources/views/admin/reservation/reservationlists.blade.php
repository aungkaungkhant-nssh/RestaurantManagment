@extends('admin.layout')
@section('content')
<div class="container mt-3">
    <h1 class="text-center mb-4" style="font-size: 35px">Reservation Lists</h1>
     <table class="table table-striped mb-4">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Guest</th>
                <th>Date</th>
                <th>Time</th>
                <th>Message</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reservation as $re)
                <tr>
                    <td>{{$re->name}}</td>
                    <td>{{$re->email}}</td>
                    <td>{{$re->phone}}</td>
                    <td>{{$re->guest}}</td>
                    <td>{{$re->date}}</td>
                    <td>{{$re->time}}</td>
                    <td>{{$re->message}}</td>
                </tr>
            @endforeach
        </tbody>
     
     </table>
     {{$reservation->links()}}
 </div>
@endsection