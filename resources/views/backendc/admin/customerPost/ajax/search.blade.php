@foreach($getAllCustomerPost as $value)
<tr>
    <td>
        <div class="form-group">
            <div class="form-check">
                <input value="{{ $value->id }}" data-id="{{ $value->id }}" class="form__check-all-target form-check-input sub_chk" type="checkbox">
            </div>
        </div>
    </td>
    <td>{{ $value->title }}</td>
    <td>{{ $value->categories->name }}</td>
    <td><img src="{{ asset('storage/avatars/'.$value->image) }}" width="100px" alt=""></td>
    <td>
        <a href="" class="btn btn-warning btn-sm btn-warning-edit"><i class="fas fa-eye"></i> View</a>
        <a href="{{ route('userpost.edit', $value->id) }}" class="btn btn-danger btn-sm"> <i class="fas fa-trash"></i> Edit</a>
    </td>
</tr>
@endforeach