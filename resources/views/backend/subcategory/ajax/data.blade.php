@foreach ($subGetCategory as $value)
<tr>
    
    <td>{{ $value->name }}</td>
    <td>{{ $value->category->name }}</td>
    <td><a href="{{ route('subcategory.edit',$value->id) }}"  ><button type="button" class="btn btn-primary" style="padding:10px; margin-left:10px;">Edit</button></a><a onclick="return confirm('Bạn có muốn xóa bài viết này không')" href="{{ route('subcategory.delete',$value->id) }}"><button type="button" class="btn btn-success" style="margin-left:10px;">Delete</button></a></td>

</tr>
@endforeach