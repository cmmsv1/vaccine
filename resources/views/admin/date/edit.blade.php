<div class="p2">
    <input type="hidden" id="id" name="id" value="{{$date->id}}">
    <div class="form-group">
        <label for="">Loại vaccine</label>
        <select class="form-control" id="name" name="name">
            <option value="AstraZeneca" {{$date->name == 'AstraZeneca'?'selected':''}}>AstraZeneca</option>
            <option value="Pfizer" {{$date->name == 'Pfizer'?'selected':''}}>Pfizer</option>
            <option value="Sinopharm" {{$date->name == 'Sinopharm'?'selected':''}}>Sinopharm</option>
            <option value="Moderna" {{$date->name == 'Moderna'?'selected':''}}>Moderna</option>
        </select>
    </div>
    <div class="form-group">
        <label for="">Số mũi</label>
        <select class="form-control" id="number" name="number">
            <option value="1" {{$date->number == '1'?'selected':''}}>Mũi 1</option>
            <option value="2" {{$date->number == '2'?'selected':''}}>Mũi 2</option>
            <option value="3" {{$date->number == '3'?'selected':''}}>Mũi 3</option>
            <option value="4" {{$date->number == '4'?'selected':''}}>Mũi 4</option>
        </select>
    </div>
    <div class="form-group">
        <label for="">Địa chỉ</label>
        <input type="text" name="address" id="name" value="{{$date->address}}" class="form-control" placeholder="Địa chỉ">
    </div>
    <div class="form-group">
        <label for="">Ngày tiêm</label>
        <input type="date" name="date" id="date" class="form-control" value="{{$date->date}}" placeholder="Ngày tiêm..">
    </div>
    <div class="form-group">
        <label for="">Giờ tiêm</label>
        <input type="time" name="time" id="time" class="form-control" value="{{$date->time}}" placeholder="Giờ tiêm..">
    </div>
    
    <div class="form-group mt-2">
        <button type="submit" class="btn btn-primary">Update</button>
    </div>  
</div>