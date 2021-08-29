@extends('admin.layout')
@section('content')
    <div class="container" style="margin-top: 20px;">
        <h1 class="text-center mb-3" style="font-size: 35px">Add Chefs</h1>
        <form action="{{route("admin.chefsadd")}}" method="POST"  enctype="multipart/form-data">
            @csrf
            @include('admin.chefs.form')
        </form>
    </div>
@endsection