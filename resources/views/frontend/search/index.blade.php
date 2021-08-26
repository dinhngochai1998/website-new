@extends('layouts.frontend')

@section('content')
<main id="news-detail-wrapper">
    <section class="section-news-detail">
        <div class="container-master">
            <div class="news-detail">
                <div class="news-detail_left">

                    <div id="list-comment">
                        @foreach ($searchPostHome as $value)
                        <div class="item" style="min-height: 230px;">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" style="float: left;">
                                    <div class="item-img">
                                        <a href="{{ route('home.detail',$value->slug) }}" rel="follow"  class="img"><img src="{{ asset('storage/avatars/'.$value->image) }}" alt="" style="max-height:194px;width: 100%;object-fit: cover;"></a>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" style="float: left;">
                                    <div class="item-body" style="padding-top:0px;">
                                        <h3 class="item-title"><a href="{{ route('home.detail',$value->slug) }}" rel="follow" >{{ $value->title }}</a></h3>
                                        <p class="des-post">{{ $value->description }}</p><br>
                                        </h4><br><span style="font-size:10px;">{{ $value->created_at }}|{{ $value->count_view }}</span><br><br>
                                        <h4 class="desc"></h4>
                                    </div>
                                </div>
                            </div>
                        </div>      
                        @endforeach
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
<script src="{{ asset('backend/js/jquery-1.8.3.min.js') }}"></script>
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
<script>
    $(document).ready(function() {
        $('#send-comment').click(function() {

            var content = $('#content-comment').val();
            var id_posts = $('#id_post').val();
            var url = $(this).attr('data-url');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: url,
                type: "POST",
                data: {
                    content,
                    id_posts
                },
                async: true,
                success: function(data) {
                    if (data.error) {
                        alertify.success(data.error);

                    } else {
                        $("#list-comment be-comment").remove();
                        $("#list-comment").append(data.html);
                        $('#content-comment').val('')
                    }
                }
            });
        });
    })
</script>