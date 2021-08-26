@foreach ($customer as $value)
<tr>
    <td>{{ $value->name }}</td>
    <td>{{ $value->email }}</td>
    <td><img src="{{ $value->avatar }}" alt="" style="width: 20%;"></td>
    <td><a href=""><a onclick="return confirm('Bạn có muốn xóa bài viết này không')" href="{{ route('customer.delete',$value->id) }}"><button type="button" class="btn btn-success">Delete</button></a></td>

</tr>
@endforeach