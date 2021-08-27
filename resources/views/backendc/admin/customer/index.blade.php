@extends('layouts.backendc')
@section('content')

<div class="wrapper">

    @include('backendc.includes.navbar-top', [
        'list' => 'Customer',
        'url' => route('customer.select')
    ])

    @include('backendc.components.alert')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="min-height: 1875.69px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6" style="padding:30px;">
                        <h1 class="float-left mr-5"><i class="nav-icon fas fa-user"></i> Customer</h1>
                        <a href="" class="btn btn-success float-left mr-2"><i class="fas fa-plus"></i> Add new</a>
                        <button class="btn btn-danger float-left delete_all" data-url=""><i class="fas fa-trash"></i> Bulk Delete</button>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">


                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <input type="text" data-url="{{ route('customer.select') }}" name="table_search" id="search-user" class="form-control float-right" placeholder="Search">

                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>
                                                <div class="form-group">
                                                    <div class="form-check">
                                                        <input class="form-check-input form__check-all" type="checkbox">
                                                    </div>
                                                </div>
                                            </th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Avatar</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody id="list-user">
                                       @include("backendc.admin.customer.ajax.search")
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-5">
                        <!-- <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div> -->
                    </div>
                    <div class="col-sm-12 col-md-7">
                        <div class="dataTables_paginate paging_simple_numbers float-right" id="example2_paginate">
                            @include('backendc.components.pagination', ['paginator' => $customer])
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <div id="sidebar-overlay"></div>
</div>
@endsection