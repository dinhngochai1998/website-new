  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="" class="brand-link">
          <img src="{{ asset('backendc/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">CRM</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                  <img src="{{ asset('backendc/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
              </div>
              <div class="info">
                  <div class="top-nav notification-row">
                      <!-- notificatoin dropdown start-->
                      <ul class="nav pull-right top-menu">
                          <li class="dropdown">
                              <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                  <span class="profile-ava">
                                      <img alt="" src="">
                                  </span>
                                  <span class="username">
                                      @if (Auth::user())
                                      <span>{{ Auth::user()->name }}</span>
                                      @endif
                                  </span>
                                  <b class="caret"></b>
                              </a>

                          </li>
                      </ul>
                  </div>
              </div>
          </div>
          <!-- SidebarSearch Form -->
          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                  <li class="nav-item menu-open">
                      <a href="#" class="nav-link active">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>
                              Dashboard
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                  </li>

                  <li class="nav-item">
                      <a href="" class="nav-link">
                          <i class="nav-icon fas fa-user"></i>
                          <p>
                              Admin & permision
                              <i class="fas fa-angle-left right"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('category.select') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Category</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('post.select') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Post</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Personal</p>
                              </a>
                          </li>
                      </ul>
                  </li>
                  <li class="nav-item">
                      <a href="" class="nav-link">
                          <i class="nav-icon fas fa-users"></i>
                          <p>
                              Customers
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('customer.select') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Customer</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('userpost.select') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Customer Post</p>
                              </a>
                          </li>

                      </ul>
                  </li>
                  <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-database"></i>
                          <p>
                              Data
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-coins"></i>
                          <p>
                              Financial
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-address-book"></i>
                          <p>
                              Contact
                          </p>
                      </a>
                  </li>
                  <li class="nav-header">SITE</li>
                  <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-book"></i>
                          <p>
                              Pages
                              <i class="fas fa-angle-left right"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Contacts</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>FAQ</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Contact us</p>
                              </a>
                          </li>
                      </ul>
                  </li>
                  <li class="nav-item">
                      <a href="" class="nav-link">
                          <i class="nav-icon far fa-image"></i>
                          <p>
                              Gallery
                          </p>
                      </a>
                  </li>
                
                  <li class="nav-item">
                      <a href="" class="nav-link">
                      <i class="nav-icon fas fa-cogs"></i>
                          <p>
                              Setting
                              <i class="fas fa-angle-left right"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item" style="margin-bottom: 20px;">
                              <a href="{{ route('category.select') }}" class="nav-link">

                                  <a href="#" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();"> <i class="far fa-circle nav-icon"></i>Logout</a>
                                  <form id="frm-logout" action="{{ route('user.logout') }}" method="POST" style="display: none;">
                                      {{ csrf_field() }}
                                  </form>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('user.changepassword') }}"> <i class="far fa-circle nav-icon"></i> ChangePassword</a>
                          </li>
                      </ul>
                  </li>
              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>