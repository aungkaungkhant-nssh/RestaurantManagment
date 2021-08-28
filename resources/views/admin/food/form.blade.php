<div class="form-group mb-3">
    <label for="">Title</label>
    <input type="text" class="form-control text-warning" name="title" value="@isset($food){{$food->title}}@endisset">
    @error('title')
        <p class="text-danger">{{ $message }}</p>
    @enderror
</div>
<div class="form-group mb-3">
    <label for="">Price</label>
    <input type="text" name="price" class="form-control  text-warning" value="@isset($food){{$food->price}}@endisset">
    @error('price')
        <p class="text-danger">{{ $message }}</p>
    @enderror
</div>
<div class="form-group mb-3">
    <label for="">Image</label>
    <input type="file"  name="image"  class="form-control">
    @isset($food)
        <img src="{{asset("storage/productsImage/$food->image")}}" alt="" style="width:200px;height:200px;">
    @endisset
    @error('image')
        <p class="text-danger">{{ $message }}</p>
    @enderror   
</div>
<div class="form-group mb-3">
    <label for="">Description</label>
    <textarea name="description" class="form-control  text-warning">@isset($food){{$food->description}}@endisset 
    </textarea>
</div>
<input type="submit" value="
@if(isset($food))
edit
@else
add
@endif
"
 class="btn btn-warning">