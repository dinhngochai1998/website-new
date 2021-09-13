@extends('layouts.auth')

@section('content')

<div class="background">
   <div class="container">
      <div class="screen">
         <div class="screen-header">
            <div class="screen-header-left">
               <div class="screen-header-button close"></div>
               <div class="screen-header-button maximize"></div>
               <div class="screen-header-button minimize"></div>
            </div>
            <div class="screen-header-right">
               <div class="screen-header-ellipsis"></div>
               <div class="screen-header-ellipsis"></div>
               <div class="screen-header-ellipsis"></div>
            </div>
         </div>
         <div class="screen-body">
            <div class="screen-body-item left">
               <div class="app-title">
                  <span>Login</span>
               </div>
               <div class="app-contact">CONTACT INFO : Sae Jan 0355777573</div>
            </div>
            <div class="screen-body-item">
               @include('components.alert')
               <form class="login-form" action='{{ route("login.login")}}' method='POST'>
                  {{ csrf_field() }}
                  <div class="app-form">
                     <span id="error" style="color:red;"></span>
                     <div class="app-form-group">
                        <input type="text" class="app-form-control" name="email" placeholder="Email">
                        <span style="color:white;"></span>
                     </div>
                     <div class="app-form-group">
                        <input type="password" class="app-form-control" name="password" placeholder="Password">
                        <span style="color:white;"></span>
                     </div>
                     <button type="submit" id="submit-login" class="app-form-button">Đăng nhập</button><br>
                     <div class="container">
                        <a href="{{ route('resetpassword.index') }}" style="text-decoration: none;" id="submit-login" class="app-form-button" data-target="#pwdModal" data-toggle="modal">Forgot my password</a>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection


