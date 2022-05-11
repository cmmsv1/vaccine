@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card">
        <div class="container-fliud">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <input type="hidden" class="oxy_id" value="{{$oxy->id}}" >
                  <div class="col-md-4">
                    <img src="{{asset('assets/images/products')}}/{{$oxy->image}}" class="img-fluid rounded-start" alt="...">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title">{{$oxy->name}}</h5>
                      <p class="card-text">{{$oxy->short_desc}}</p>
                      <p class="card-text">Giá :  @php
                        echo number_format($oxy->price, 0, ',', '.').'đ';
                    @endphp</p>
                      <p>Số lượng</p>
                      <div class="quantity-input mb-3">
                        <input disabled type="text" pattern="[0-9]*"  data-max="{{$oxy->quantity}}" class="product_quantity"  style="width: 50px;margin-right: 20px">
                        <button type="button" class="btn btn-outline-primary btn-increase" style="border-radius: 50%">+</button>
                        <button type="button" class="btn btn-outline-primary btn-reduce" style="border-radius: 50%">-</button>
                      </div>
                      @if (Auth::id())
                        <a class="btn btn-primary payment" href="">Mua ngay</a>
                      @else
                        <a class="btn btn-primary" href="/login">Mua ngay</a>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
            {{-- modal --}}
            <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" style="max-width: 1000px"  >
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="formModalLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form enctype="multipart/form-data" id="actions" >
                                @csrf
                                <div id="page" class="p-2"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('.product_quantity').val('1');
        function sleep(miliseconds) {
            var currentTime = new Date().getTime();
            while (currentTime + miliseconds >= new Date().getTime()) {
            }
        }
        function validate() { 
            var name = $('#name').val();
            var phone = $('#phone').val();
            var address = $('#address').val();
            var errors = {};
            if (!name) {
                Object.assign(errors, {name: "Bạn cần nhập tên"});
            }
            if (!phone) {
                Object.assign(errors, {phone: "Bạn cần nhập số điện thoại"});
            }
            if (!address) {
                Object.assign(errors, {address: "Bạn cần nhập địa chỉ"});
            }
            return errors;
        }
        function reset(){
            $('.name_error').text('');
            $('.phone_error').text('');
            $('.address_error').text('');
        }
        $('#actions').submit(function (e) { 
            e.preventDefault();
            reset();
            var errors = validate();
            if(Object.keys(errors).length === 0){           
                var name =$('#name').val();
                var phone =$('#phone').val();
                var address =$('#address').val();
                var message =$('#message').val();          
                var oxy_id = $('.oxy_id').val();
                var quantity = $('.product_quantity').val();
                var total = {{$oxy->price}} * quantity;
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "POST",
                    url: "/oxy/order",
                    data: {
                        name:name,
                        phone:phone,
                        oxy_id:oxy_id,
                        address:address,
                        total:total,
                        quantity:quantity,
                        message:message
                    },
                    success: function (response) {
                        $('#formModal').modal('hide');
                        swal({
                            title: "Success!",
                            text: response.message,
                            icon: "success",
                            buttons: ["Quản lý đơn hàng!", "Ở lại trang!"],
                            })
                            .then((ok) => {
                            if (ok) {
                                
                            } else {
                                window.location.href = "/user/orders";
                            }
                        });
                        
                    }
                });
            }else{
                for(const [key, value] of Object.entries(errors)){
                    $('.'+ key+'_error').text(value);
                    $('.'+ key+'_error').parent().addClass('has-error');
                }
            }
            
        });
        // show form add category
        $(document).on('click', '.payment',function(event) {
                event.preventDefault();          
                $.get("/oxy/detail/payment",
                    function (data) {
                        $("#formModalLabel").html('Thông tin khách hàng')
                        $('#formModal').modal('show');
                        $('#page').html(data)
                    }
                );
                var quantity = $('.product_quantity').val();
                var total = {{$oxy->price}} * quantity;
                var total_format = total.toLocaleString('it-IT', {style : 'currency', currency : 'VND'});
                var id = $('.oxy_id').val();
                setTimeout(
                    function() 
                    {
                        $('.oxy_name').html("{{$oxy->name}}");
                        $('.oxy_quantity').html(quantity);
                        $('.oxy_price').html("@php
                        echo number_format($oxy->price, 0, ',', '.').'đ';
                    @endphp");
                        $('.oxy_image').attr('src', '{{asset('assets/images/products')}}/{{$oxy->image}}');
                        $('.total').html(total_format);
                        $('#oxy_id_form').val(id);
                }, 700);
                    
               
                
            });
        
        $(document).on('click','.btn-increase',function (e) { 
            e.preventDefault();
            var inc_value = $(this).closest('.quantity-input').find('.product_quantity').val();
            var inc_max = $(this).closest('.quantity-input').find('.product_quantity').data('max');
            var value = parseInt(inc_value,10);
            var value_max = parseInt(inc_max,10);
            value = isNaN(value)? 0 : value;
            value_max = isNaN(value_max)? 0 : value_max;
            if(value < value_max){
                value++;
                $(this).closest('.quantity-input').find('.product_quantity').val(value);
            }
        });
        $(document).on('click','.btn-reduce',function (e) { 
            e.preventDefault();
            var inc_value = $(this).closest('.quantity-input').find('.product_quantity').val();
            var value = parseInt(inc_value,10);
            value = isNaN(value)? 0 : value;
            if(value > 1){
                value--;
                $(this).closest('.quantity-input').find('.product_quantity').val(value);
            }
            else{
                value = 1;
                $(this).closest('.quantity-input').find('.product_quantity').val(value);
            }
        });
    });
</script>
@endsection