<div class="p2">
    <input type="hidden" id="id" name="id" value="{{$register->id}}">
    <div class="form-group">
        <label for="status">Trạng thái</label>
        <select class="form-control" id="status" name="status">        
                <option value="0" selected>Đăng kí mới</option>
                <option value="1">Đã tiêm</option>
        </select>
        <span style="color: red;font-size: 12px;margin-top: 10px" class="oxy_producer_id_error"></span>
    </div>
    <div class="form-group mt-2">
        <button type="submit" class="btn btn-primary">Update</button>
    </div>  
</div>