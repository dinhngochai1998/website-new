@extends('layouts.backend')
@section('content')
<div class="wrapper">

    @include('backend.includes.navbar-top', [
        'edit' => 'Customer',
        'id' => $customer->id,
        'url' => route('backend.admin.customer.show')
    ])

    @include('backend.components.alert')

    <div class="content-wrapper" style="min-height: 1602px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6" style="padding:30px;">
                        <h1 class="float-left mr-5"><i class="nav-icon fas fa-user"></i> User Edit</h1>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <form method="POST" action="{{ route('backend.admin.customer.update') }}" enctype="multipart/form-data">
                @csrf
                {{ method_field('PATCH') }}
                <input type="hidden" name="id" value="{{ $customer->id }}" />
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputName">Last Name</label>
                                    <input type="text" name="last_name" value="{{ $customer->first_name }}" id="inputName" class="form-control" required />
                                    @if ($errors->has('last_name'))
                                    <div class="mt-1 text-red-500">
                                        {{ $errors->first('last_name') }}
                                    </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="inputName">First Name</label>
                                    <input type="text" name="first_name" value="{{ $customer->last_name }}" id="inputName" class="form-control" required />
                                    @if ($errors->has('first_name'))
                                    <div class="mt-1 text-red-500">
                                        {{ $errors->first('first_name') }}
                                    </div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="inputDescription">Email</label>
                                    <input type="email" name="email" value="{{ $customer->email }}" id="inputName" class="form-control" required />
                                    @if ($errors->has('email'))
                                    <div class="mt-1 text-red-500">
                                        {{ $errors->first('email') }}
                                    </div>
                                    @endif
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