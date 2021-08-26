<header id="header">
    <nav class="ss-navbar" style="margin-bottom: 10px;">

        <div class="ss-navbar-logo">
            <a href="{{ route('home.index') }}"><svg x="0px" y="0px" viewBox="0 0 1500 1500" xml:space="preserve" width="165" style="height: 124px;
    margin: -35;
    padding-right: 40px;
">
                    <style type="text/css">
                        .st0 {
                            fill: #FF7200;
                        }

                        .st1 {
                            fill: #FFFFFF;
                        }
                    </style>
                    <g id="V_2_">
                        <g id="V_1_">
                            <title>Logo2020</title>
                            <polygon id="V" class="st0" points="105.6,547 190.5,547 291.5,765.2 413.3,547 477.2,547 291.4,953.5  "></polygon>
                        </g>
                    </g>
                    <g id="M_2_">
                        <g id="M_3_">
                            <polygon id="M_4_" class="st1" points="344.9,953.5 528.8,547.7 681.3,853.1 830.3,547.7 1028.9,953.5 959.8,953.5 833.8,727.4  718.2,953.5 651.3,953.5 525.4,730.8 416.9,953.5  "></polygon>
                        </g>
                    </g>
                    <g id="O_2_">
                        <g id="O_1_">
                            <path id="O" class="st1" d="M1190,547c-112.2,0.5-202.8,92-202.2,204.3s92.1,202.8,204.4,202.2c111.8-0.6,202.2-91.4,202.2-203.2 C1394.1,637.7,1302.6,546.7,1190,547z M1277.9,857.2c-59.8,45.9-152.3,41.1-198.1-18.7c-45.8-59.8-18.4-145.1,41.4-190.9 c59.8-45.8,140.3-50.4,186.1,9.4C1353.1,716.8,1337.7,811.3,1277.9,857.2L1277.9,857.2z"></path>
                        </g>
                    </g>
                </svg></a>
        </div>
        <div class="ss-navbar-menu">
            <ul>
                @foreach ($categories as $value)
                    <li>
                        <a href="{{ route('home.category', $value->slug)  }}">{{ $value->name }}</a>
                        @if($subCategories->count() > 0)
                            <ul>
                                @foreach ($subCategories as $subMenu)
                                    @if ($value->id == $subMenu->parent_id)
                                        <li><a href="{{ route('home.category', $subMenu->slug) }}" id="list-submenu">{{ $subMenu->name }}</a></li>
                                    @endif                        
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach
                <li><a href="{{ route('contact.index') }}">Liên Hệ</a></li>
                <li>
                    @if(Auth::guard('customer')->user())
                    <img class="user-image" style="height: 20px;margin: 27px;" src="{{ Auth::guard('customer')->user()->avatar }}" alt="">
                    <span class="user-name">{{ Auth::guard('customer')->user()->name }}</span>
                    <ul>
                        <li><a href="#" id="profile"><i class="icon_clock_alt" ></i>Thông Tin</a></li>
                        <li><a href="{{ route('customerpost.get') }}" id="profile"><i class="icon_clock_alt"></i> Đăng bài</a></li>
                        <li><a href="#" id="profile" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();"><i class="icon_clock_alt"></i> Logout</a></li>
                        <form id="frm-logout" action="{{ route('customer.logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </ul>
                    @else
                    <a href="{{ route('login.provider', 'google') }}">{{ __('G-SUITE LOGIN') }}</a>
                    @endif
                </li>
                <li>
                    <div class="" id="search-home" style="">
                        <form  action="{{ route('search.posthome') }}" method="GET" role="form">            
                            <div class="form-group" style="position: relative;">
                               
                                <input style="width: 300px;padding: 15px;float: left;" type="text" class="form-control" name="search" placeholder="search"><button id="submit" type="submit" class="btn btn-primary">Tìm</button>
                            </div>                          
                        </form>
                    </div>
                </li>

                <!-- <div style="width: 2%; margin-top: 26px;"><img src="{{ asset('frontend/images/search.jpg') }}" alt=""></div>
                 -->

            </ul>
            
            <div class="ss-navbar-toggle-search">
                <svg style="margin-right: -23px; margin-top: 7px;"  width="20"height="20" class="search-icon" role="img" viewBox="2 9 20 5" focusable="false" aria-label="Search">
                <path class="search-icon-path" d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"></path></svg>
            </div>
        </div>
       
        <div class="ss-navbar-toggle">
            <svg viewBox="0 0 24 24" width="24" height="24">
                <rect x="0" y="0" width="4" height="4" stroke-width="0"></rect>
                <rect x="20" y="0" width="4" height="4" stroke-width="0"></rect>
                <rect x="10" y="10" width="4" height="4" stroke-width="0"></rect>
                <rect x="0" y="20" width="4" height="4" stroke-width="0"></rect>
                <rect x="20" y="20" width="4" height="4" stroke-width="0"></rect>
                <rect x="10" y="0" width="4" height="4" stroke-width="0" class="icon-animate1"></rect>
                <rect x="0" y="10" width="4" height="4" stroke-width="0" class="icon-animate2"></rect>
                <rect x="20" y="10" width="4" height="4" stroke-width="0" class="icon-animate3"></rect>
                <rect x="10" y="20" width="4" height="4" stroke-width="0" class="icon-animate4"></rect>
            </svg>
        </div>
    </nav>
</header>
<script src="{{ asset('frontend/vendor/jquery-3.2.1.min.js') }}"></script>

<script>
    $(document).ready(function() {
       
        $('.ss-navbar-toggle-search').click(function() {
            $('#search-home').toggle();           
        });
        
            
    })
</script>


