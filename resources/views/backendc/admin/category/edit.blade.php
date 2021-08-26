@extends('layouts.backendc')
@section('content')
<div class="wrapper">

    @include('backendc.includes.navbar-top', [
        'edit' => 'Category',
        'id' => $editCategory->id,
        'url' => route('category.select')
    ])

    @include('backendc.components.alert')

    <div class="content-wrapper" style="min-height: 1602px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6" style="padding:30px;">
                        <h1 class="float-left mr-5"><i class="nav-icon fas fa-user"></i> Category Edit</h1>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <form method="POST" action="{{ route('category.update') }}" enctype="multipart/form-data">
                @csrf
                {{ method_field('PATCH') }}
                <input type="hidden" name="id" value="{{ $editCategory->id }}" />
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputName">Name</label>
                                    <input type="text" name="name" value="{{ $editCategory->name }}" id="inputName" class="form-control" required />
                                    @if ($errors->has('name'))
                                    <div class="mt-1 text-red-500">
                                        {{ $errors->first('name') }}
                                    </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="inputName">Slug</label>
                                    <input type="text" name="slug" value="{{ $editCategory->name }}" id="inputName" class="form-control" required />
                                    @if ($errors->has('slug'))
                                    <div class="mt-1 text-red-500">
                                        {{ $errors->first('slug') }}
                                    </div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="inputDescription">Parent</label>
                                    <select name="parent_id" id="">
                                        <option value="">Chọn chuyên mục</option>
                                        @foreach ($getEditCategory as $value)
                                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
  
                </div>
                <div class="row">
                    <div class="col-12">
                        <input type="submit" value="Edit user" class="btn btn-success float-left mr-2" />
                        <a href="#" class="btn btn-secondary float-left">Cancel</a>
                    </div>
                </div>
            </form>
        </section>
        <!-- /.content -->
    </div>

</div>

@endsection