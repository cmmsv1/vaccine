<div class="p2">
    <input type="hidden" id="id" name="id" value="">
    <div class="form-group">
        <label for="">Loại vaccine</label>
        <select class="form-control" id="name" name="name">
            <option value="AstraZeneca">AstraZeneca</option>
            <option value="Pfizer">Pfizer</option>
            <option value="Sinopharm">Sinopharm</option>
            <option value="Moderna">Moderna</option>
        </select>
        <span style="color: red;font-size: 12px;margin-top: 10px" class="name_error"></span>
    </div>
    <div class="form-group">
        <label for="">Số mũi</label>
        <select class="form-control" id="number" name="number">
            <option value="1">Mũi 1</option>
            <option value="2">Mũi 2</option>
            <option value="3">Mũi 3</option>
            <option value="4">Mũi 4</option>
        </select>
        <span style="color: red;font-size: 12px;margin-top: 10px" class="name_error"></span>
    </div>
    <div class="form-group">
        <label for="">Địa chỉ</label>
        <input type="text" name="address" id="address" class="form-control" placeholder="Địa chỉ">
        <span style="color: red;font-size: 12px;margin-top: 10px" class="name_error"></span>
    </div>
    <div class="form-group">
        <label for="">Ngày tiêm</label>
        <input type="date" name="date" id="date" class="form-control" placeholder="Ngày tiêm..">
        <span style="color: red;font-size: 12px;margin-top: 10px" class="name_error"></span>
    </div>
    <div class="form-group">
        <label for="">Giờ tiêm</label>
        <input type="time" name="time" id="time" class="form-control" placeholder="Giờ tiêm..">
        <span style="color: red;font-size: 12px;margin-top: 10px" class="name_error"></span>
    </div>
    
    <div class="form-group mt-2">
        <button type="submit" class="btn btn-success">Thêm</button>
    </div>
</div>
