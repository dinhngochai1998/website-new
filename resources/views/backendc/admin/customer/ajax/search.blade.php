@foreach($customer as $value)
<tr>
    <td>
        <div class="form-group">
            <div class="form-check">
                <input value="{{ $value->id }}" data-id="{{ $value->id }}" class="form__check-all-target form-check-input sub_chk" type="checkbox">
            </div>
        </div>
    </td>
    <td>{{ $value->name }}</td>
    <td>{{ $value->email }}</td>
    <td><img src="{{ $value->avatar }}" width="100px" alt=""></td>
    <td>
        <a href="" class="btn btn-warning btn-sm btn-warning-edit"><i class="fas fa-eye"></i> View</a>
        <a href="{{ route('customer.delete', $value->id) }}" class="btn btn-danger btn-sm"> <i class="fas fa-trash"></i> Delete</a>
    </td>
</tr>
@endforeach