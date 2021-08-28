<div class="form-group mb-3">
    <label for="">Title</label>
    <input type="text" class="form-control" name="title">
    @error('title')
        <p class="text-danger">{{ $message }}</p>
    @enderror
</div>
<div class="form-group mb-3">
    <label for="">Price</label>
    <input type="text" name="price" class="form-control">
    @error('price')
        <p class="text-danger">{{ $message }}</p>
    @enderror
</div>
<div class="form-group mb-3">
    <label for="">Image</label>
    <input type="file"  name="image"  class="form-control">
    @error('image')
        <p class="text-danger">{{ $message }}</p>
    @enderror   
</div>
<div class="form-group mb-3">
    <label for="">Description</label>
    <textarea name="description" class="form-control"></textarea>
</div>
<input type="submit" value="Add" class="btn btn-warning">