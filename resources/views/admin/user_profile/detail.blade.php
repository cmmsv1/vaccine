@extends('layouts.dashboard')
@section('content')
<style>
    .form-check-input{
        cursor: pointer;
    }
</style>
    <div class="container">
        
        <div class="py-4 px-4">
            <a href="{{route('admin.user-profile')}}" class="btn btn-primary"><i class="ti-arrow-left"></i></a>
            <form action="" method="POST" id="formInfo" >
                @csrf
                <div id="user_info">
                    <div class="row" >      
                        <h3 class="text-center mb-3" >Thông tin cá nhân</h3>          
                        <div class="col-lg-6">
                                <input type="hidden" id="form_id" value="{{$info->id}}">
                                <div class="form-group">
                                    <label for="">Full Name</label>
                                    <input type="text" name="name" value="{{$user_info->name}}" disabled class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Birthday</label>
                                    <input type="date" name="birthday" value="{{$user_info->birthday}}" disabled class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Số hộ chiếu/CMND/CCCD</label>
                                    <input type="text" name="cmnd" value="{{$user_info->cmnd}}" disabled class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Số thẻ BHYT</label>
                                    <input type="text" name="bhyt" value="{{$user_info->bhyt}}" disabled class="form-control">
                                </div>       
                                <div class="form-group">
                                    <label for="">Nghề nghiệp</label>
                                    <input type="text" name="job" value="{{$user_info->job}}" disabled class="form-control">
                                </div> 
                                <div class="form-group">
                                    <label for="" style="margin-right: 40px">Gender :</label>
                                    <label class="radio-inline" style="margin-right: 10px"><input disabled type="radio" value="1" {{$user_info->gender == 1?'checked':''}} name="gender">Nam</label>
                                    <label class="radio-inline"><input type="radio" value="0" disabled {{$user_info->gender == 0?'checked':''}} name="gender">Nữ</label>                       
                                </div>
                        </div>
                        <div class="col-lg-6">
                            
                            <div class="form-group">
                                <label for="">Đối tượng</label>
                                <input type="text" name="doituong" value="{{$user_info->doituong}}" disabled class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Tỉnh/Thành Phố</label>
                                <input type="text" name="province" value="{{$user_info->province}}" disabled class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Quận/Huyện</label>
                                <input type="text" name="district" value="{{$user_info->district}}" disabled class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Phường/Xã</label>
                                <input type="text" name="ward" value="{{$user_info->ward}}" disabled class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Địa chỉ nơi ở</label>
                                <input type="text" name="house" value="{{$user_info->house}}" disabled class="form-control">
                            </div>
                        </div>     
                    </div>
                   
                </div>
                <div id="register_info">
                    <div class="row">
                        <h3 class="text-center">Tiểu sử tiêm, tiền sử bệnh nền</h3>
                        <div class="col-lg-12 mx-auto mt-4">
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
                                        <td class="text-center"><input class="form-check-input" {{$prehistoric->info1 == 1?'checked':''}} value="1"  type="radio" disabled name="info1">     
                                        <td class="text-center"><input class="form-check-input" {{$prehistoric->info1 == 0?'checked':''}} value="0" type="radio" disabled name="info1"></td>
                                    </tr>
                                    <tr>
                                        <td>2. Tiền sử bị covid-19 trong vòng 6 tháng</td>
                                        <td class="text-center"><input class="form-check-input" value="1" {{$prehistoric->info2 == 1?'checked':''}} type="radio" disabled name="info2">     
                                        <td class="text-center"><input class="form-check-input" value="0" {{$prehistoric->info2 == 0?'checked':''}} type="radio" disabled name="info2"></td>
                                    </tr>
                                    <tr>
                                        <td>3. Tiền sử tiêm Vaccine khác trong vòng 14 ngày qua</td>
                                        <td class="text-center"><input class="form-check-input" value="1" {{$prehistoric->info3 == 1?'checked':''}} type="radio" disabled name="info3">     
                                        <td class="text-center"><input class="form-check-input" value="0" {{$prehistoric->info3 == 0?'checked':''}} type="radio" disabled name="info3"></td>
                                    </tr>
                                    <tr>
                                        <td>4. Tiền sử suy giảm miễn dịch, ung thư giai đoạn cuối ...</td>
                                        <td class="text-center"><input class="form-check-input" value="1" {{$prehistoric->info4 == 1?'checked':''}} type="radio" disabled name="info4">     
                                        <td class="text-center"><input class="form-check-input" value="0" {{$prehistoric->info4 == 0?'checked':''}} type="radio" disabled name="info4"></td>
                                    </tr>
                                    <tr>
                                        <td>5. Đang dùng các thuốc ức chế miễn dịch hoặc điều trị hoá trị, xạ trị</td>
                                        <td class="text-center"><input class="form-check-input" value="1" {{$prehistoric->info5 == 1?'checked':''}} type="radio" disabled name="info5">     
                                        <td class="text-center"><input class="form-check-input" value="0" {{$prehistoric->info5 == 0?'checked':''}} type="radio" disabled name="info5"></td>
                                    </tr>
                                    <tr>
                                        <td>6. Bệnh cấp tính</td>
                                        <td class="text-center"><input class="form-check-input" value="1" {{$prehistoric->info6 == 1?'checked':''}} type="radio" disabled name="info6">     
                                        <td class="text-center"><input class="form-check-input" value="0" {{$prehistoric->info6 == 0?'checked':''}} type="radio" disabled name="info6"></td>
                                    </tr>
                                    <tr>
                                        <td>7. Tiền sử bệnh mãn tính đang phát triển</td>
                                        <td class="text-center"><input class="form-check-input" value="1" {{$prehistoric->info7 == 1?'checked':''}} type="radio" disabled name="info7">     
                                        <td class="text-center"><input class="form-check-input" value="0" {{$prehistoric->info7 == 0?'checked':''}} type="radio" disabled name="info7"></td>
                                    </tr>
                                    <tr>
                                        <td>8. Tiền sử rối loạn đông máu/cầm máu</td>
                                        <td class="text-center"><input class="form-check-input" value="1" {{$prehistoric->info8 == 1?'checked':''}} type="radio" disabled name="info8">     
                                        <td class="text-center"><input class="form-check-input" value="0" {{$prehistoric->info8 == 0?'checked':''}} type="radio" disabled name="info8"></td>
                                    </tr>
                                    <tr>
                                        <td>9. Tiền sử dị ứng với các nguyên nhân khác</td>
                                        <td class="text-center"><input class="form-check-input" value="1" {{$prehistoric->info9 == 1?'checked':''}} type="radio" disabled name="info9">     
                                        <td class="text-center"><input class="form-check-input" value="0" {{$prehistoric->info9 == 0?'checked':''}} type="radio" disabled name="info9"></td>
                                    </tr>


                                </tbody>
                            </table>
                            
                        </div>
                    </div>
                </div>
                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">Xác nhận</button>
                </div>
            </form> 
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('#formInfo').submit(function (e) { 
                e.preventDefault();
                $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                });
                e.preventDefault();
                var id = $('#form_id').val();
                $.ajax({
                    type: "post",
                    url: "/admin/user-profile/detail/update/"+id,
                    data: {
                    },
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