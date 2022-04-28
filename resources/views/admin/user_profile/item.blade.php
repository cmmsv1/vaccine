@if ($forms)
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Họ và tên</th>
            <th>Status</th>
            <th>Chi tiết</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($forms as $item)                         
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->user->name}}</td>
                @if ($item->user->confirm_register == 1)
                    <td>Đăng ký mới</td>
                @elseif($item->user->confirm_register == 2)
                    <td>Đã xác nhận</td>
                @endif
                
                <td><a href="{{route('admin.user-profile.detail',$item->id)}}" class="btn btn-primary">Chi tiết</a></td>
            </tr>
        @endforeach
    </tbody>
</table>
{!! $forms->links()!!}
@else
    <span>Không có user nào</span>
@endif