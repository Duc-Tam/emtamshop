<table class="table table-sm">
    <thead>
      <tr>
        <th style="width: 10px">#</th>
        <th>Tên SP</th>
        <th>Ảnh</th>
        <th>Giá</th>
        <th>Số lượng</th>
        <th>Tổng tiền</th>
        <th style="width: 40px">Action</th>
      </tr>
    </thead>
    @foreach ($order as $item)
    <tbody>
      <tr>
        <td>#{{ $item->id }}</td>
        <td>{{ $item->product->p_name }}</td>
        <td>
            <img src="{{ $item->product->image_path }}" alt="" style="width:80px;height:80px;">
        </td>
        <td>{{ number_format($item->price) }}</td>
        <td>{{ $item->quantity }}</td>
        <td>{{ number_format($item->price*$item->quantity) }}</td>
        <td><a href="" class="btn btn-xs btn-danger">Delete</a></td>
      </tr>
    </tbody>
    @endforeach
</table>