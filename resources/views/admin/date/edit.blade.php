<div class="p2">
    <input type="hidden" id="id" name="id" value="{{$date->id}}">
    <div class="form-group">
        <label for="">Loại vaccine</label>
        <input type="text" name="name" id="name" class="form-control" value="{{$date->name}}" placeholder="Loại vaccine">
        <span style="color: red;font-size: 12px;margin-top: 10px" class="name_error"></span>
    </div>
    <div class="form-group">
        <label for="">Số mũi</label>
        <input type="number" name="number" id="name" value="{{$date->number}}" class="form-control" placeholder="Số mũi">
        <span style="color: red;font-size: 12px;margin-top: 10px" class="name_error"></span>
    </div>
    <div class="form-group">
        <label for="">Địa chỉ</label>
        <input type="text" name="address" id="name" value="{{$date->address}}" class="form-control" placeholder="Địa chỉ">
        <span style="color: red;font-size: 12px;margin-top: 10px" class="name_error"></span>
    </div>
    <div class="form-group">
        <label for="">Ngày tiêm</label>
        <input type="date" name="date" id="date" class="form-control" value="{{$date->date}}" placeholder="Ngày tiêm..">
        <span style="color: red;font-size: 12px;margin-top: 10px" class="name_error"></span>
    </div>
    <div class="form-group">
        <label for="">Giờ tiêm</label>
        <input type="time" name="time" id="time" class="form-control" value="{{$date->time}}" placeholder="Giờ tiêm..">
        <span style="color: red;font-size: 12px;margin-top: 10px" class="name_error"></span>
    </div>
    
    <div class="form-group mt-2">
        <button type="submit" class="btn btn-primary">Update</button>
    </div>  
</div>