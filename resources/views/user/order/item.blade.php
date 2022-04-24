@if ($orders)
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên khách hàng</th>
            <th>Số điện thoại</th>
            <th>Thành tiền</th>
            <th>Thời gian đặt hàng</th>
            <th>Trạng thái</th>
            <th>Chi tiết</th>
        </tr>
    </thead>
    <tbody>     
        @foreach ($orders as $order)                    
        <tr>
            
                
            
            <td>{{$order->id}}</td>
            <td>{{$order->name}}</td>
            <td>{{$order->phone}}</td>
            <td>@php echo number_format($order->total, 0, ',', '.').'đ';@endphp</td>
            <td>{{$order->created_at}}</td>
            @if ($order->status == 0)
                <td><span style="color:#fff;padding: 10px;background-color: rgb(79,83,79)">Đơn hàng mới</span></td>
            @elseif ($order->status == 1)
                <td><span style="color:#fff;padding: 10px;background-color: rgb(56, 201, 75)">Đã được xác nhận</span></td>
            @elseif ($order->status == 2)
                <td><span style="color:#fff;padding: 10px;background-color: rgb(85, 114, 231)">Đang giao hàng</span></td>
            @elseif ($order->status == 3)
                <td><span style="color:#fff;padding: 10px;background-color: rgb(198, 226, 84)">Giao hàng thành công</span></td>
            @else 
                <td><span style="color:#fff;padding: 10px;background-color: rgb(231, 64, 81)">Đã bị huỷ bỏ</span></td>
            @endif
            <td><a href="{{route('user.orders.detail',$order->id)}}" class="btn btn-primary">Chi tiết</a></td>
           
        </tr>
        @endforeach
    </tbody>
</table>
{!! $orders->links()!!}
@else
    <span>không có đơn nào</span>
@endif