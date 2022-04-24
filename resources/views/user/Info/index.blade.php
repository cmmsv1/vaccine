@extends('layouts.dashboard')
@section('content')
<style>
    .form-check-input{
        cursor: pointer;
    }
</style>
    <div class="container">
        <div class="py-4 px-4">
            <form action="" method="POST" id="formInfo" >
                @csrf
                <div id="user_info">
                    <div class="row" >      
                        <h3 class="text-center mb-3" >Thông tin cá nhân</h3>          
                        <div class="col-lg-6">
                                        
                                <div class="form-group">
                                    <label for="">Full Name</label>
                                    <input type="text" name="name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Birthday</label>
                                    <input type="date" name="birthday" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Số hộ chiếu/CMND/CCCD</label>
                                    <input type="text" name="cmnd" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Số thẻ BHYT</label>
                                    <input type="text" name="bhyt" class="form-control">
                                </div>       
                                <div class="form-group">
                                    <label for="">Nghề nghiệp</label>
                                    <input type="text" name="job" class="form-control">
                                </div> 
                                <div class="form-group">
                                    <label for="" style="margin-right: 40px">Gender :</label>
                                    <label class="radio-inline" style="margin-right: 10px"><input type="radio" value="1" checked name="gender">Nam</label>
                                    <label class="radio-inline"><input type="radio" value="0" name="gender">Nữ</label>                       
                                </div>
                        </div>
                        <div class="col-lg-6">
                            
                            <div class="form-group">
                                <label for="">Đối tượng</label>
                                <input type="text" name="doituong" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Tỉnh/Thành Phố</label>
                                <input type="text" name="province" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Quận/Huyện</label>
                                <input type="text" name="district" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Phường/Xã</label>
                                <input type="text" name="ward" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Địa chỉ nơi ở</label>
                                <input type="text" name="house" class="form-control">
                            </div>
                        </div>     
                    </div>
                    <span class="btn btn-primary" id="next_user" style="float: right;margin-right: 40px">Tiếp tục</span>
                    <div style="clear: both"></div>
                </div>
                <div id="register_info" style="display: none">
                    <div class="row">
                        <h3 class="text-center">Tiểu sử tiêm, tiền sử bệnh nền</h3>
                        <div class="col-lg-10 mx-auto mt-4">
                            <table class="table table-bordered">
                                <thead>
                                  <tr>
                                    <th style="text-align: center;">Tiền sử</th>
                                    <th style="width: 5%;text-align: center;">Có</th>
                                    <th style="width: 5%;text-align: center;">Không</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1. Tiền sử phản vệ từ 2 độ trở lên</td>
                                        <td class="text-center"><input class="form-check-input" value="1"  type="radio" name="info1">     
                                        <td class="text-center"><input class="form-check-input" value="0" type="radio" name="info1"></td>
                                    </tr>
                                    <tr>
                                        <td>2. Tiền sử bị covid-19 trong vòng 6 tháng</td>
                                        <td class="text-center"><input class="form-check-input" value="1" type="radio" name="info2">     
                                        <td class="text-center"><input class="form-check-input" value="0" type="radio" name="info2"></td>
                                    </tr>
                                    <tr>
                                        <td>3. Tiền sử tiêm Vaccine khác trong vòng 14 ngày qua</td>
                                        <td class="text-center"><input class="form-check-input" value="1" type="radio" name="info3">     
                                        <td class="text-center"><input class="form-check-input" value="0" type="radio" name="info3"></td>
                                    </tr>
                                    <tr>
                                        <td>4. Tiền sử suy giảm miễn dịch, ung thư giai đoạn cuối ...</td>
                                        <td class="text-center"><input class="form-check-input" value="1" type="radio" name="info4">     
                                        <td class="text-center"><input class="form-check-input" value="0" type="radio" name="info4"></td>
                                    </tr>
                                    <tr>
                                        <td>5. Đang dùng các thuốc ức chế miễn dịch hoặc điều trị hoá trị, xạ trị</td>
                                        <td class="text-center"><input class="form-check-input" value="1" type="radio" name="info5">     
                                        <td class="text-center"><input class="form-check-input" value="0" type="radio" name="info5"></td>
                                    </tr>
                                    <tr>
                                        <td>6. Bệnh cấp tính</td>
                                        <td class="text-center"><input class="form-check-input" value="1" type="radio" name="info6">     
                                        <td class="text-center"><input class="form-check-input" value="0" type="radio" name="info6"></td>
                                    </tr>
                                    <tr>
                                        <td>7. Tiền sử bệnh mãn tính đang phát triển</td>
                                        <td class="text-center"><input class="form-check-input" value="1" type="radio" name="info7">     
                                        <td class="text-center"><input class="form-check-input" value="0" type="radio" name="info7"></td>
                                    </tr>
                                    <tr>
                                        <td>8. Tiền sử rối loạn đông máu/cầm máu</td>
                                        <td class="text-center"><input class="form-check-input" value="1" type="radio" name="info8">     
                                        <td class="text-center"><input class="form-check-input" value="0" type="radio" name="info8"></td>
                                    </tr>
                                    <tr>
                                        <td>9. Tiền sử dị ứng với các nguyên nhân khác</td>
                                        <td class="text-center"><input class="form-check-input" value="1" type="radio" name="info9">     
                                        <td class="text-center"><input class="form-check-input" value="0" type="radio" name="info9"></td>
                                    </tr>


                                </tbody>
                            </table>
                            
                        </div>
                        <div class="row mt-5">
                            <div class="col-lg-9"></div>
                            <div class="col-lg-3">
                                <div>
                                    <button class="btn btn-success" id="back_info" style="margin-right: 20px">Quay lại</button>
                                    <button class="btn btn-primary" id="next_Info">Tiếp tục</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="confirm" style="display: none">
                    <h3 class="text-center">Phiếu đồng ý</h3>
                    <p class="mt-5">1. Tiêm chủng Vaccine là hình thức phòng chống dịch hiệu quả, tuy nhiên Vaccine phòng covid-19 có thể không phòng bệnh hoàn toàn. Người được tiêm chủng Vaccine phòng covid-19 có thể phòng được bênh hoặc giảm mức độ nặng bệnh. Tuy nhiên sau khi tiêm vẫn phải tiếp tục thực hiện nghiêm các biện pháp phòng chống dịch theo quy định </p>
                    <p>2. Tiêm chủng vaccine phòng covid-19 có thể gây ra 1 số hiện tượng bất thường về sức khoẻ như các biểu hiện tại chỗ tiêm hoặc toàn thân, bao gồm phản ứng thông thường sau tiêm chủng và tai biến nặng sau tiêm chủng</p>
                    <p>3, Khi có biểu hiện bất thường về sức khoẻ, người được tiêm chủng cần đến ngay cơ sở y tế gần nhất để được tư vấn thăm khám</p>
                    <div style="float: right;">
                        <span style="margin-right: 20px">Đồng ý tiêm chủng:</span>
                        <label class="radio-inline" >
                            <input class="form-check-input" type="radio" name="confirm" value="1">Có
                          </label>
                          <label class="radio-inline" style="margin-left: 10px">
                            <input class="form-check-input" type="radio" name="confirm" value="0">Không
                          </label>
                    </div>
                    <div style="clear: both"></div>
                    <div class="row mt-5">
                        <div class="col-lg-9"></div>
                        <div class="col-lg-3">
                            <div style="float: right;">
                                <button class="btn btn-success" id="back_confirm" style="margin-right: 20px">Quay lại</button>
                                <button type="submit" class="btn btn-primary" id="submit_form">Cập nhật</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form> 
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $("#next_user").click(function (e) { 
                e.preventDefault();
                $('#user_info').hide();
                $('#register_info').fadeIn();
            });
            $("#back_info").click(function (e) { 
                e.preventDefault();
                $('#user_info').fadeIn();
                $('#register_info').hide();
            });
            $("#next_Info").click(function (e) { 
                e.preventDefault();
                $('#confirm').fadeIn();
                $('#register_info').hide();
            });
            $("#back_confirm").click(function (e) { 
                e.preventDefault();
                $('#register_info').fadeIn();
                $('#confirm').hide();
            });
            $('#formInfo').submit(function (e) { 
                e.preventDefault();
                var data = new FormData(this);
                $.ajax({
                    type: "POST",
                    url: "{{route('user.formInfo.update')}}",
                    data: data,
                    processData: false,
                    dataType: 'json',
                    contentType: false,
                    success: function (response) {
                        swal({
                            title: "Success!",
                            text: response.message,
                            icon: "success",
                        });
                    }
                });
            });
        });
    </script>
@endsection