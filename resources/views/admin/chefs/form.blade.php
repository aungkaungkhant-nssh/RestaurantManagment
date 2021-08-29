<div class="form-group mb-3">
    <label for="">Name</label>
    <input type="text" class="form-control text-warning" name="name" value="@isset($chef){{$chef->name}}@endisset">
    @error('name')
        <p class="text-danger">{{ $message }}</p>
    @enderror

</div>
<div class="form-group mb-3">
    <label for="">Speciality</label>
    <input type="text" name="speciality" class="form-control  text-warning" value="@isset($chef){{$chef->speciality}}@endisset">
    @error('speciality')
        <p class="text-danger">{{ $message }}</p>
    @enderror
</div>
<div class="form-group mb-3">
    <label for="">Image</label>
    <input type="file"  name="image"  class="form-control">
    @isset($chef)
        <img src="{{asset("storage/chefsImage/$chef->image")}}" alt="" style="width:200px;height:200px;">
    @endisset
    @error('image')
        <p class="text-danger">{{ $message }}</p>
    @enderror    
</div>
<input type="submit" value="
@if(isset($chef))
edit
@else
add
@endif
"
 class="btn btn-warning">