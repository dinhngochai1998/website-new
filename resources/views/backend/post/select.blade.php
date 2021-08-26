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
                                <form  class="navbar-form" action="" method="GET">
                                    <div class="form-group" style="margin: -10px;margin-bottom: 10px;">
                                        <input class="form-control" data-url="{{ route('post.select') }}" name="search" id="search-post" placeholder="Search" type="text">

                                    </div>
                                </form>
                            </li>
                        </ul>
                        <!--  search form end -->
                    </div>
                    <br>

                </div>
                </div>
                <!-- page start-->

                <div class="row">

                    <span id="add-post"><a href="{{ route('post.index') }}" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Add Post</a></span>
                    <div class="col-sm-12">
                        <section class="panel">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>@sortablelink('title')</th>
                                        <th>@sortablelink('categories.name')</th>
                                        <th>image</th>                                   
                                        <th style="padding-left: 50px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="list-post">
                                    @include('backend.post.ajax.data')
                                </tbody>
                            </table>

                        </section>
                        <div style="text-align: center;">{{ $getAllPost->links() }}</div>
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
            $('#search-post').keyup(function() {
                var title = $('#search-post').val();
                var url = $(this).attr('data-url');
                $.ajax({
                        url: url,
                        type: "GET",
                        data: {
                            title
                        }
                    })
                    .done(function(data) {
                        if (data.html == " ") {
                            $('.ajax-load').html("No more records found");
                            return;
                        }
                        $('#list-post tr').remove();
                        $("#list-post").append(data.html);
                    })
                    .fail(function(jqXHR, ajaxOptions, thrownError) {
                        alert('server not responding...');
                    });
            })

        })
    </script>