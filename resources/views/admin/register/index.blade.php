@extends('layouts.dashboard')
@section('admin')
    <div class="container">
        <div class="py-4 px-4">
            <h3 class="text-center">Quản lý đăng ký tiêm</h3>
            <div class="row mt-3">
                <div class="col-lg-10 mx-auto">
                    <h4 class="text-center">Danh sách đăng ký tiêm</h4>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <input type="text" id="search_box" class="form-control" placeholder="Search.....">
                            </div>
                        </div>
                    </div>
                    <div id="read">
                        @include('admin.register.read')
                    </div>
                </div>
                <input type="hidden" name="hidden_page" id="hidden_page" value="1">

                {{-- modal --}}
                <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
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

    <script>
        $(document).ready(function () {


            // lấy data add vào read
            function fetch_data(page,search=''){
                $.ajax({
                    url: '/admin/register-vaccine/read?page='+page+"&search="+search,
                    success: function(data){
                        $('#read').html(data);
                    }
                });
            }
            // search
            $(document).on('keyup', '#search_box',function(event) { 
                var search = $("#search_box").val();
                var page = $("#hidden_page").val();
                fetch_data(page,search);
            });
            // phân trang
            $(document).on('click', '.pagination a',function(event)
            {
                event.preventDefault();
                var page=$(this).attr('href').split('page=')[1];
                var search = $(this).parent().parent().parent().parent().parent().parent().parent().find('#search_box').val();
                fetch_data(page,search);
            });

            // update
            $('#actions').submit(function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    type: "POST",
                    url: "{{route('admin.register-vaccine.store')}}",
                    data: formData,
                    processData: false,
                    dataType: 'json',
                    contentType: false,
                    success: function (response) {
                        $('#formModal').modal('hide');
                        swal({
                            title: "Success!",
                            text: response.message,
                            icon: "success",
                        });
                        fetch_data();
                    },
                });
            });

            // edit
            $(document).on('click', '.edit',function(event) {
                event.preventDefault();
                var id = $(this).data('href');
                $.get("/admin/register-vaccine/edit/"+id,
                    function (data) {
                        $("#formModalLabel").html('Sửa trạng thái')
                        $('#formModal').modal('show');
                        $('#page').html(data);
                    }
                );
            })

        });
    
        
    </script>
@endsection