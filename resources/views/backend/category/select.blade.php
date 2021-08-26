@extends('layouts.admin')
@section('content')

<body>
    <!-- container section start -->
    <section id="container" class="">
        <!--header start-->
        <!--header end-->

        <!--sidebar start-->
        <aside>
        @include('backend.table.index')
        </aside>

        <!--main content start-->
        <section id="main-content">
            <section class="wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <ul class="nav top-menu">
                            <li>
                                <form class="navbar-form" action="" method="GET">
                                    <div class="form-group">
                                        <input style="margin: -10px;margin-bottom: 10px;" class="form-control" name="search" data-url="{{ route('category.select') }}"  id="search-category" placeholder="Search" type="text">
                                        <!-- <button type="button" style="padding:4px;" id="searchPost" class="btn btn-primary">Tìm kiếm</button> -->
                                    </div>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- page start-->
                <div class="row">
                    <div class="col-sm-12">
                        <section class="panel">
                            <header class="panel-heading">
                            <span id="add-category"><a href="{{ route('category.index') }}" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Add Category</a></span>
                            </header>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>slug</th>
                                        <th style="padding-left:58px;">Action</th>                                      
                                    </tr>
                                </thead>
                                <tbody id="list-category">
                                    @include('backend.category.ajax.data')
                                </tbody>
                            </table>
                        </section>
                    </div>

                </div>
                <!-- page end-->
            </section>
        </section>
        <!--main content end-->
        <div class="text-right">
            <div class="credits">
                <!--
            All the links in the footer should remain intact.
            You can delete the links only if you purchased the pro version.
            Licensing information: https://bootstrapmade.com/license/
            Purchase the pro version form: https://bootstrapmade.com/buy/?theme=NiceAdmin
          -->
            </div>
        </div>
    </section>
    @endsection
    <script src="{{ asset('backend/js/jquery-1.8.3.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#search-category").keyup(function() {
                var name = $('#search-category').val();
                var url = $(this).attr('data-url');
                console.log(name);
                $.ajax({
                        url: url,
                        type: "GET",
                        data: {
                            name
                        },
                    })
                    .done(function(data) {
                        if (data.html == " ") {
                            $('.ajax-load').html("No more records found");
                            return;
                        }
                        $('#list-category tr').remove();
                        $("#list-category").append(data.html);
                    })
                    .fail(function(jqXHR, ajaxOptions, thrownError) {
                        alert('server not responding...');
                    });
            })
        });
    </script>