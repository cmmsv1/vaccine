<style>
    #imgs img{
        margin: 5px 15px;
    }
</style>
<div class="p2">
    <div class="row">
        <div class="col-lg-6">
            <input type="hidden" id="id" name="id" value="">
            <div class="form-group">
                <label for="name">Tên sản phẩm</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="Tên sản phẩm...">
                <span style="color: red;font-size: 12px;margin-top: 10px" class="name_error"></span>
            </div>
            <div class="form-group">
                <label for="short_desc">Mô tả ngắn</label>
                <textarea id="short_desc" name="short_desc" placeholder="Mô tả ngắn ...." class="form-control" rows="3"></textarea>
                <span style="color: red;font-size: 12px;margin-top: 10px" class="short_desc_error"></span>
            </div>
            <div class="form-group">
                <label for="desc">Mô tả chi tiết</label>
                <textarea id="desc" name="desc" placeholder="Mô tả chi tiết ..." class="form-control" rows="4"></textarea>
                <span style="color: red;font-size: 12px;margin-top: 10px" class="desc_error"></span>
            </div>
            <div class="form-group">
                <label for="price">Giá bán</label>
                <input type="number" name="price" id="price" class="form-control" placeholder="Giá bán ....">
                <span style="color: red;font-size: 12px;margin-top: 10px" class="price_error"></span>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="status">Tình trạng</label>
                <select class="form-control" id="status" name="status">
                    <option value="1">Còn hàng</option>
                    <option value="0">Hết hàng</option>
                </select>
            </div>
            <div class="form-group">
                <label for="quantity">Số lượng</label>
                <input type="number" name="quantity" id="quantity" class="form-control" placeholder="Số lượng ....">
                <span style="color: red;font-size: 12px;margin-top: 10px" class="quantity_error"></span>
            </div>
            <div class="form-group">
                <label for="oxy_producer_id">Danh mục</label>
                <select class="form-control" id="oxy_producer_id" name="oxy_producer_id">
                    @foreach ($categories as $item)             
                            <option value="{{$item->id}}">
                                {{$item->name}}
                            </option>
                    @endforeach
                </select>
                <span style="color: red;font-size: 12px;margin-top: 10px" class="category_id_error"></span>
            </div>
            <div class="form-group">
                <label for="image">Ảnh</label>
                <input type="file" name="image" id="image"  class="form-control" onChange="readURL(this);">
                <img id="img" class="mt-3" style="width: 100px;height: 100px;display: none" alt="">
                <span style="color: red;font-size: 12px;margin-top: 10px" class="image_error"></span>
            </div>
        </div>
    </div>
    <div class="form-group mt-2">
        <button class="btn btn-success" type="submit">Thêm sản phẩm</button>
    </div>
</div>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#img').show();
                $('#img').attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>