<header class="header dark-bg">
  <div class="toggle-nav">
    <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
  </div>

  <!--logo start-->
  <a href="{{ route('post.select') }}" class="logo"> <span class="lite">Admin</span></a>
  <!--logo end-->

 
  <div class="top-nav notification-row">
    <!-- notificatoin dropdown start-->
    <ul class="nav pull-right top-menu">

      <!-- task notificatoin start -->

      <!-- task notificatoin end -->
      <!-- inbox notificatoin start-->
      <!-- inbox notificatoin end -->
      <!-- alert notification start-->
      <!-- alert notification end-->
      <!-- user login dropdown start-->
      <li class="dropdown">
        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
          <span class="profile-ava">
            <img alt="" src="">
          </span>
          <span class="username">
            @if (Auth::user())
            <span><i class="fa fa-user" aria-hidden="true"></i>  {{ Auth::user()->name }}</span>
            @endif
          </span>
          <b class="caret"></b>
        </a>
        <ul class="dropdown-menu extended logout">
          <div class="log-arrow-up"></div>
          <li>
            <a href="{{ route('user.changepassword') }}"><i class="fa fa-key" aria-hidden="true"></i> ChangePassword</a>
          </li>
          <li>
          <li><a href="#" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();"><i class="icon_clock_alt"></i> Logout</a></li>
          <form id="frm-logout" action="{{ route('user.logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
          </form>
      </li>
    </ul>
    </li>
    <!-- user login dropdown end -->
    </ul>
    <!-- notificatoin dropdown end-->
  </div>
</header>