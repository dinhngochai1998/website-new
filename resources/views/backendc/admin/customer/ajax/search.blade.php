@foreach($getCustomer as $value)
    <tr>
        <td>
            <div class="form-group">
                <div class="form-check">
                    <input value="{{ $value->id }}" data-id="{{ $value->id }}" class="form__check-all-target form-check-input sub_chk" type="checkbox">
                </div>
            </div>
        </td>
        <td>{{ $value->last_name }} {{ $value->first_name }}</td>
        <td>{{ $value->email }}</td>
        <td>{{ $value->verification_code }}</td>
        <td>{{ $value->verified }}</td>
        <td>
            <a href="{{ route('backend.admin.customer.view' , $value->id) }}" class="btn btn-warning btn-sm btn-warning-edit"><i class="fas fa-eye"></i> View</a>
            <a href="{{ route('backend.admin.customer.edit', $value->id) }}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i> Edit</a>
            <a href="{{ route('backend.admin.customer.delete', $value->id) }}" class="btn btn-danger btn-sm"> <i class="fas fa-trash"></i> Delete</a>
        </td>
    </tr>
@endforeach