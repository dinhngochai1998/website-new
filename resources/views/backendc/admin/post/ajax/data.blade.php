@foreach($getAllPost as $value)
    <tr>

        <td>{{ $value->title }}</td>
        <td>{{ $value->categories->name }}</td>
        <td><img src="{{ asset('storage/avatars/'.$value->image) }}" width="100px" alt=""></td>

        <td>
            <a href="{{ route('post.edit', $value->id) }}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i> Edit</a>
            <a href="{{ route('post.delete', $value->id) }}" class="btn btn-danger btn-sm"> <i class="fas fa-trash"></i> Delete</a>
        </td>
    </tr>
@endforeach