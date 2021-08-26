@extends('layouts.backend')

@section('content')
<section class="login-block">
   <div class="container ">
      <div class="row ">
         <div class="col-md-4 col-md-offset-4 login-sec">
            <h2 class="text-center">Update Subcategory</h2>
            @include('components.alert')
            <form class="login-form" action='{{ route("subcategory.update") }} ' method='POST' enctype="multipart/form-data">
               {{ csrf_field() }}
               {{ method_field('PATCH') }}
               <input type="hidden" name='id' value="{{ $editCategory->id }}">
               <div class="form-group">
                  <label for="exampleInputEmail1" class="text-uppercase">Name <sup>*</sup></label>
                  <input type="text" name='name' value='{{ $editCategory->name ? $editCategory->name : "" }}' class="form-control" placeholder="">
               </div>
               <div class="form-group">
                  <label for="exampleInputPassword1" class="text-uppercase">Slug <sup>*</sup></label>
                  <input type="text" name='slug' value='{{ $editCategory->slug ? $editCategory->slug : "" }}' class="form-control" placeholder="">
               </div>
               <div class="form-check col-md-offset-4">
                  <button type="submit" class="btn btn-login float-right">Update</button>
               </div>
            </form>
</section>
@endsection