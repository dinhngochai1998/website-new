@foreach ($getAllPost as $value)
<tr>
    <td>{{ $value->title }}</td>
    <td>{{ $value->categories->name }}</td>
    <td><img src="{{ asset('storage/avatars/'.$value->image) }}" width="100px" alt=""></td>
    <td ><a href="{{ route('post.edit',$value->id) }}" style="padding:10px;"><button type="button" class="btn btn-success" >Edit</button></a><a onclick="return confirm('Bạn có muốn xóa bài viết này không')" href="{{ route('post.delete',$value->id) }}"><button type="button" class="btn btn-danger" style="margin-left: 3px;">Delete</button></a></td>
   
</tr>
@endforeach
