@extends('admin.layout')
@section('content')
<div class="container" style="margin-top: 20px;">
    <h1 class="text-center mb-3" style="font-size: 35px">Edit Chef</h1>
    <form action="{{route("admin.chefedit",$chef->id)}}" method="POST"  enctype="multipart/form-data">
        @csrf
        @include('admin.chefs.form')
    </form>
</div>
@endsection