@if (count($products)>0)
<div class="table-responsive mt-4">
    <table class="table table-striped table-bordered table-responsive ">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>Tình trạng</th>
                <th>Số lượng</th>
                <th>Ảnh</th>
                <th>Tên danh mục</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody id="tbody">
                @foreach ($products as $item)                                                                         
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->name}}</td>
                        <td>
                            @php
                                echo number_format($item->price, 0, ',', '.').'đ';
                            @endphp
                        </td>
                        @if ($item->status == '1')
                            <td>Còn hàng</td>
                        @else
                            <td>Hết hàng</td>
                        @endif
                        <td>{{$item->quantity}}</td>
                        <td><img src="{{asset('assets/images/products')}}/{{$item->image}}" ></td>
                        <td>{{$item->oxy_producer->name}}</td>
                        
                        <td>
                            <a data-href="{{$item->id}}" class="btn icon btn-primary edit"  style="margin: 0px 15px">
                                <i class="ti-pencil"></i>
                            </a>
                            <a data-href="{{$item->id}}" class="btn icon btn-danger remove">
                                <i class="ti-trash"></i>
                            </a>
                        </td>
                            
                    </tr>
                @endforeach
            </tbody>
            
    </table>
    
</div>
<div class="mt-2">
    {!!$products->render()!!}
</div>
@else
    <p>Không tìm thấy sản phẩm nào phù hợp</p>
@endif