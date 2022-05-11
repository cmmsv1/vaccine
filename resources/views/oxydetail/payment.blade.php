<style>
    #imgs img{
        margin: 5px 15px;
    }
</style>
<div class="p2">
    <div class="row">
        <div class="col-lg-5">
            <input type="hidden" id="oxy_id_form" name="oxy_id" value="">
            <div class="form-group">
                <label for="name">Họ và tên</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="Họ và tên...">
                <span style="color: red;font-size: 12px;margin-top: 10px" class="name_error"></span>
            </div>
            <div class="form-group">
                <label for="short_desc">Số điện thoại</label>
                <input id="phone" name="phone" placeholder="Số điện thoại ...." class="form-control" />
                <span style="color: red;font-size: 12px;margin-top: 10px" class="phone_error"></span>
            </div>
            <div class="form-group">
                <label for="desc">Địa chỉ</label>
                <textarea id="address" name="address" placeholder="Địa chỉ nhận hàng ..." class="form-control" rows="4"></textarea>
                <span style="color: red;font-size: 12px;margin-top: 10px" class="address_error"></span>
            </div>
            <div class="form-group">
                <label for="">Lưu ý cho người bán:</label>
                <textarea id="message" name="message" placeholder="Lưu ý cho người bán ..." class="form-control" rows="2"></textarea>
            </div>
        </div>
        <div class="col-lg-7">
            <h4 class="text-center">Sản phẩm mua</h4>
            <table class="table table-striped table-bordered mt-3">
                <thead>
                    <tr>
                        <td>Tên sản phẩm</td>
                        <td>Số lượng</td>
                        <td>Giá</td>
                        <td>Ảnh</td>
                    </tr>
                </thead>
                <tbody>
                        <tr>
                            <td class="oxy_name"></td>
                            <td class="oxy_quantity"></td>
                            <td class="oxy_price"></td>
                            <td><img width="20px" height="20px" class="oxy_image" src="" alt=""></td>
                        </tr>
                    
                </tbody>
            </table>
            <span>Tổng tiền: <span class="total"></span> </span>
        </div>
    </div>
    <div class="form-group mt-2">
        <button class="btn btn-success" type="submit">Đặt hàng</button>
    </div>
</div>
