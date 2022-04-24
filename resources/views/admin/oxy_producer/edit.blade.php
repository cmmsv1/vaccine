<div class="p2">
    <input type="hidden" id="id" name="id" value="{{ $category->id}}">
    <div class="form-group">
        <input type="text" name="name" id="name" value="{{ $category->name }}" class="form-control"
            placeholder="name product">
    </div>
    <div class="form-group mt-2">
        <button type="submit" class="btn btn-primary">Update</button>
    </div>  
</div>