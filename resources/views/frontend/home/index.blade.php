@extends('layouts.frontend')

@section('content')
<main id="news-wrapper">
    <div class="container-master">
        <div class="news-head">
            <div class="news-head_left">
                <div class="item">
                    @if($getPost)
                    <div class="item-img">
                        <a href="{{ route('home.detail', $getPost->slug) }}" title="" class="imgc"><img src="{{ asset('storage/avatars/'.$getPost->image) }}" alt=""></a>
                    </div>
                    <div class="item-body">
                        <h3 class="item-title"><a href="{{ route('home.detail', $getPost->slug) }}" title="" style="font-size: 30px;">{{ $getPost->title }}</a></h3>
                    </div>
                    @endif
                </div>
            </div>
            <div class="news-head_right">
               
                <div class="box-item">
                    <h2 class="box-title">Bài viết nổi bật</h2>
                    @foreach ($getPostHighLights as $value)
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="hot-news">
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" id="hotnews-img">
                            <div class="item">
                                <div class="item-img">
                                    <a href="{{ route('home.detail', $value->slug) }}" title="" class="imgc"><img style="height: 100px" src="{{ asset('storage/avatars/'.$value->image) }}" alt=""></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" id="hotnews-title">
                                <div class=" box-content">
                            <ul>
                                <li style="padding:0px;"><a href="{{ route('home.detail', $value->slug) }}" title="">{{ $value->title }}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="news-list">
        <div class="news-list_left">
            <div class="box-item">
                <div class="item">
                    @foreach ($getPostData as $value)

                    <span style="color:#ffa500; font-size:20px">{{ $value->categories->name }}</span><br>
                    <div class="item-img"><br>
                        <a href="{{ route('home.detail', $value->slug) }}" title="" class="imgc"><img src="{{ asset('storage/avatars/'.$value->image) }}" alt=""></a> <br>
                    </div>
                    <br>
                    <div class="item-body">
                        <h3 class="item-title"><a href="{{ route('home.detail', $value->slug) }}" title="">{{ $value->title  }}</a></h3>
                        <h4 class="desc">
                            {{ $value->description }}
                        </h4><br><span style="font-size:15px;">{{ $value->created_at }} | {{ $value->count_view }} Lượt xem</span><br><br>
                    </div>

                    @endforeach
                </div>
            </div>
        </div>
        <div class="news-list_right">
            <div class="list-item">
                @if($getPostHotNews)
                <h3 class="list-title"><a href="{{ route('home.detail',$getPostHotNews->slug) }}" title="">{{ $getPostHotNews->categories->name }}</a></h3>
                <div class="list-content">
                    <div class="list-content_left">
                        <div class="item">
                            <div class="item-img">
                                <a href="{{ route('home.detail',$getPostHotNews->slug) }}" title="" class="imgc"><img src="{{ asset('storage/avatars/'.$getPostHotNews->image) }}" alt=""></a>
                            </div>
                            <div class="item-body">
                                <h4 class="item-title"><a href="{{ route('home.detail',$getPostHotNews->slug) }}" title="">{{ $getPostHotNews->title  }}</a></h4>

                            </div>
                        </div>
                    </div>
                    <div class="list-content_right">
                        <ul>
                            @foreach ($getPostHotNews1 as $value)
                            <li><a href="{{ route('home.detail',$value->slug) }}" title="">{{ $value->title }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
            </div>
            <div class="list-item">
                @if($getRecruitment)
                <h3 class="list-title"><a href="{{ route('home.detail',$getRecruitment->slug) }}" title="">{{ $getRecruitment->categories->name }}</a></h3>
                <div class="list-content">
                    <div class="list-content_left">
                        <div class="item">
                            <div class="item-img">
                                <a href="{{ route('home.detail',$getRecruitment->slug) }}" title="" class="imgc"><img src="{{ asset('storage/avatars/'.$getRecruitment->image) }}" alt=""></a>
                            </div>
                            <div class="item-body">
                                <h4 class="item-title"><a href="{{ route('home.detail',$getRecruitment->slug) }}" title="">{{ $getRecruitment->title  }}</a></h4>
                            </div>
                        </div>
                    </div>
                    <div class="list-content_right">                                   
                        <ul>
                        @foreach ($getRecruitment1 as $value)
                            <li><a href="{{ route('home.detail',$value->slug) }}" title="">{{ $value->title }}</a></li>
                            @endforeach
                        </ul>              
                    </div>
                    @endif
                </div>
            </div>
            <div class="list-item">
                @if($getPostCultural)
                <h3 class="list-title"><a href="{{ route('home.detail',$getPostCultural->slug) }}" title="">{{ $getPostCultural->categories->name }}</a></h3>
                <div class="list-content">
                    <div class="list-content_left">
                        <div class="item">
                            <div class="item-img">
                                <a href="{{ route('home.detail',$getPostCultural->slug) }}" title="" class="imgc"><img src="{{ asset('storage/avatars/'.$getPostCultural->image) }}" alt=""></a>
                            </div>
                            <div class="item-body">
                                <h4 class="item-title"><a href="{{ route('home.detail',$getPostCultural->slug) }}" title="">{{ $getPostCultural->title  }}</a></h4>
                            </div>
                        </div>
                    </div>
                    <div class="list-content_right">
                        <ul>
                            @foreach ($getPostCultural1 as $value)
                            <li><a href="{{ route('home.detail',$value->slug) }}" title="">{{ $value->title }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
            </div>
            <div class="list-item">
                @if($getPostProject)
                <h3 class="list-title"><a href="{{ route('home.detail',$getPostCultural->slug) }}" title="">{{ $getPostProject->categories->name }}</a></h3>
                <div class="list-content">
                    <div class="list-content_left">
                        <div class="item">
                            <div class="item-img">
                                <a href="{{ route('home.detail',$getPostCultural->slug) }}" title="" class="imgc"><img src="{{ asset('storage/avatars/'.$getPostProject->image) }}" alt=""></a>
                            </div>
                            <div class="item-body">
                                <h4 class="item-title"><a href="{{ route('home.detail',$getPostProject->slug) }}" title="">{{ $getPostProject->title  }}</a></h4>
                            </div>
                        </div>
                    </div>
                    <div class="list-content_right">
                        <ul>
                            @foreach ($getPostProject1 as $value)
                            <li><a href="{{ route('home.detail',$value->slug) }}" title="">{{ $value->title }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    </div>
</main>
<div class="action-fixed">
    <ul>
        <li><a href="" title=""><img src="{{ asset('frontend/images/icon/s5.png') }}" alt=""></a></li>
        <li><a href="" title=""><img src="{{ asset('frontend/images/icon/s4.png') }}" alt=""></a></li>
        <li><a href="" title=""><img src="{{ asset('frontend/images/icon/s3.png') }}" alt=""></a></li>
        <li><a href="https://chat.zalo.me/?null" title=""><img src="{{ asset('frontend/images/icon/s2.png') }}" alt=""></a></li>
        <li><a href="https://www.facebook.com/sua.hai.79/" title=""><img src="{{ asset('frontend/images/icon/s1.png') }}" alt=""></a></li>
    </ul>
</div>

@endsection