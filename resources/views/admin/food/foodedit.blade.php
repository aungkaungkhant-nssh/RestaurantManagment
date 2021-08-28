@extends('admin.layout')
@section('content')
    <div class="container" style="margin-top: 20px;">
        <h1 class="text-center mb-3" style="font-size: 35px">Edit Products</h1>
        <form action="{{route("admin.foodedit",$food->id)}}" method="POST"  enctype="multipart/form-data">
            @csrf
            @include('admin.food.form')
        </form>
    </div>
@endsection