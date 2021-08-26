@extends('layouts.backend')

@section('content')
<section class="login-block">
   <div class="container ">
      <div class="row ">
         <div class="col-md-4 col-md-offset-4 login-sec">
            <h2 class="text-center">Update Post</h2>
            @include('components.alert')
            <form class="login-form" action='{{ route("userpost.update") }} ' method='POST' enctype="multipart/form-data">
               {{ csrf_field() }}
               {{ method_field('PATCH') }}
               <input type="hidden" name='id' value="{{ $editCustomerPost->id }}">
               <div class="form-group">
                  <label for="exampleInputEmail1" class="text-uppercase">Status <sup>*</sup></label>
                  <input type="text" name='status' value='{{ $editCustomerPost->status ? $editCustomerPost->status : "" }}' class="form-control" placeholder="">
               </div>
             
               <div class="form-check col-md-offset-4">
                  <!-- <label class="form-check-label">
         <input type="checkbox" class="form-check-input">
         <small>Remember Me</small>
         </label> -->
                  <button type="submit" class="btn btn-login float-right">Update</button>
               </div>
            </form>
</section>

@endsection