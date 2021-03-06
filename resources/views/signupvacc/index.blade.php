@extends('layouts.app')
@section('content')
    <div class="px-4 py-4">
      <h3 class="text-center">Đăng ký tiêm vaccine</h3>
      <div class="row container mx-auto">
        <div class="col-lg-12 mx-auto">
          <input type="hidden" id="check" value="{{Auth::user()->confirm_register}}">
          <input type="hidden" id="type" value="{{Auth::user()->type}}">
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Loại vaccin</th>
                    <th>Số mũi</th>
                    <th>Địa chỉ</th>
                    <th>Ngày tiêm</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($vaccines as $item)
                  <tr>
                    <th>{{$item->id}}</th>
                    <td>{{$item->name}}</td>
                    <td>{{$item->number}}</td>
                    <td>{{$item->address}}</td>
                    <td>{{$item->time . ' - ' .$item->date }}</td>
                    <td><a data-href="{{$item->id}}" data-number='{{$item->number}}' data-name ='{{$item->name}}' style="color: #fff" class="btn btn-primary register">Đăng ký</a></td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
        </div>
    </div>
    </div>
    <script>
      $(document).ready(function () {
        $('.register').click(function (e) { 
            e.preventDefault();
            var check = $('#check').val();
            var type = $('#type').val();
            if((check == 2 && type == 'USER') || type == 'ADMIN'){
              var id = $(this).data('href');
              var number = $(this).data('number');
              var vaccine_name = $(this).data('name');
              console.log(vaccine_name);
              $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });
              $.ajax({
                  type: "POST",
                  url: "{{route('signupvacc.register')}}",
                  data: {
                      id:id,
                      number:number,
                      vaccine_name:vaccine_name
                  },
                  success: function (response) {
                      if(response.success){
                        swal({
                              title: "Success!",
                              text: response.success,
                              icon: "success",
                          });
                      }
                      if(response.error){
                        swal({
                              title: "Error!",
                              text: response.error,
                              icon: "warning",
                          });
                      }
                  }
              });
            }else if(check == 1 && type == 'USER'){
              swal({
                  title: "Error!",
                  text: 'Thông tin của bạn đang được xác minh! Vui lòng đợi',
                  icon: "warning",          
              });
            }
            else{
              swal({
                  title: "Error!",
                  text: 'Bạn cần điền thông tin trước',
                  icon: "warning",
                  buttons: ["Điền thông tin!", "Ở lại trang!"],
                  })
                  .then((ok) => {
                  if (ok) {
                      
                  } else {
                      window.location.href = "/user/formInfo";
                  }
              });
            }
            
        });
      });
    </script>
@endsection