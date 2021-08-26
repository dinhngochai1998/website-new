@foreach ($getAllCustomerPost as $value)
<tr>
    <td>{{ $value->title }}</td>
    <td>{{ $value->categories->name }}</td>
    <td>{{ $value->status }}</td>
    <td><img src="{{ asset('storage/avatars/'.$value->image) }}" width="100px" alt=""></td>
    <td ><a href="{{ route('userpost.edit', $value->id) }}"><button type="button" class="btn btn-success" >Edit</button></a>
</tr>
@endforeach