@foreach($getCategory as $value)
    <tr>
        <td>
            <div class="form-group">
                <div class="form-check">
                    <input value="{{ $value->id }}" data-id="{{ $value->id }}" class="form__check-all-target form-check-input sub_chk" type="checkbox">
                </div>
            </div>
        </td>
        <td>{{ $value->name }}</td>
        <td>{{ $value->slug }}</td>
        <td>
            <a href="{{ route('category.edit',$value->id) }}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i> Edit</a>
            <a href="{{ route('category.delete',$value->id) }}" class="btn btn-danger btn-sm"> <i class="fas fa-trash"></i> Delete</a>
        </td>
    </tr>
@endforeach