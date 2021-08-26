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
                                        <input class="form-control" data-url="{{ route('post.select') }}" name="search" id="customer-post" placeholder="Search" type="text">
                                        
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
                    <div class="col-sm-12">
                        <section class="panel">               
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Status</th>
                                        <th>Image</th>
                                        <th>edit</th>                                    
                                    </tr>
                                </thead>
                                <tbody id="list-customerpost">
                                    @include('backend.customerPost.ajax.data')
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
            $('#customer-post').keyup(function() {
                var title = $('#customer-post').val();
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
                        $('#list-customerpost tr').remove();
                        $("#list-customerpost").append(data.html);
                    })
                    .fail(function(jqXHR, ajaxOptions, thrownError) {
                        alert('server not responding...');
                    });
            })

        })
    </script>