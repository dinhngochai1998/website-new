@extends('layouts.backend')

@section('content')
<section class="login-block">
   <div class="container ">
      <div class="row ">
         <div class="col-md-4 col-md-offset-4 login-sec">
            <h2 class="text-center">Change Password</h2>
            @include('components.alert')
            <form class="login-form" action='{{ route("user.changepasswordupdate")}}' method='POST'>
               {{ csrf_field() }}
               <div class="form-group">
                  <label for="exampleInputPassword1" class="text-uppercase">Mật Khẩu Cũ <sup>*</sup></label>
                  <input type="password" name='old_password' class="form-control" placeholder="">
               </div>
               <div class="form-group">
                  <label for="exampleInputPassword1" class="text-uppercase">Mật khẩu mới<sup>*</sup></label>
                  <input type="password" name='news_password' class="form-control" placeholder="">
               </div>
               <div class="form-group">
                  <label for="exampleInputPassword1" class="text-uppercase">Nhập lại mật khẩu <sup>*</sup></label>
                  <input type="password" name='confirm_password' class="form-control" placeholder="">
               </div>
               <div class="form-check col-md-offset-4">
                  <!-- <label class="form-check-label">
         <input type="checkbox" class="form-check-input">
         <small>Remember Me</small>
         </label> -->
                  <button type="submit" class="btn btn-login float-right">Thay đổi password</button>
               </div>
            </form>
</section>


@endsection