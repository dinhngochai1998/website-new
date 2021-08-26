@extends('layouts.frontend')

@section('content')



<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8" style="margin:220px; ">
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
        <button type="button" class="btn btn-success" id="add-post"><a href="{{ route('customerpost.index') }}"  style="color:white;">Thêm bài</a></button>
    </div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Bài viết</th>
                <th>Trạng thái</th>               
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($getPostCustomer as $value)
            <tr>
                <td>{{ $value->title }}</td>
                <td>{{ $value->status === 1 ? 'Đã được đăng' : 'Chờ xét duyệt' }}</td>
                <td ><a href="{{ route('customerpost.edit', $value->id) }}" style="margin-right: -40px;"><button type="button" class="btn btn-success">Edit</button></a>  <a href="{{ route('customerpost.delete', $value->id) }}" style="color:red;"><button type="button" class="btn btn-primary">Delete</button></a></td>
                
            </tr>
            @endforeach

        </tbody>
    </table>
</div>
@endsection