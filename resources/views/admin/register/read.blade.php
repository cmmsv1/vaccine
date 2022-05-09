@if (count($dates)>0)
<div class="table-responsive mt-4">
    <table class="table table-striped table-bordered ">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên người đăng ký</th>
                <th>Số mũi</th>
                <th>Loại vaccine</th>
                <th>Ngày tiêm</th>
                <th>Trạng thái</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody id="tbody">
                @foreach ($dates as $item)                                                                         
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->user->name}}</td>
                        <td>{{$item->date_of_injection->number}}</td>
                        <td>{{$item->vaccine_name}}</td>
                        <td>{{$item->date_of_injection->time .' - '. $item->date_of_injection->date}}</td>
                        <td>{{ $item->status == 0 ? 'Đăng ký mới':'Đã tiêm'}}</td>
                        @if ($item->status == 0)
                            <td>
                                <a data-href="{{$item->id}}" class="btn icon btn-primary edit">
                                    <i class="ti-pencil"></i>
                                </a>
                            </td>
                        @else
                            <td>Xong</td>
                        @endif                     
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
