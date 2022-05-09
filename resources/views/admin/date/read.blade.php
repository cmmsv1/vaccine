@if (count($dates)>0)
<div class="table-responsive mt-4">
    <table class="table table-striped table-bordered table-responsive">
        <thead>
            <tr>
                <th>ID</th>
                <th>Loại vaccine</th>
                <th>Số mũi</th>
                <th>Địa chỉ</th>
                <th>Ngày tiêm</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody id="tbody">
                @foreach ($dates as $item)                                                                         
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->number}}</td>
                        <td>{{$item->address}}</td>
                        <td>{{$item->time .' '. $item->date}}</td>
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
    {!!$dates->render()!!}
</div>
@else
<p>Không tìm thấy ngày tiêm ...</p>
@endif
