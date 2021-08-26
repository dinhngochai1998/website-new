@extends('layouts.backend')

@section('content')
<section class="login-block">
   <div class="container ">
      <div class="row ">
      <div class="col-md-10  login-sec">
            <h2 class="text-center">Update Post</h2>
            @include('components.alert')
            <form class="login-form" action='{{ route("post.update") }} ' method='POST' enctype="multipart/form-data">
               {{ csrf_field() }}
               {{ method_field('PATCH') }}
               <input type="hidden" name='id' value="{{ $editPost->id }}">
               <div class="form-group">
                  <label for="exampleInputEmail1"  class="text-uppercase">Title <sup>*</sup></label>
                  <input type="text" name='title' onkeyup="ChangeToSlug();"  id="title" value='{{ $editPost->title ? $editPost->title : "" }}' class="form-control" placeholder="">
               </div>
               <div class="form-group">
                  <label for="exampleInputPassword1" class="text-uppercase">Slug <sup>*</sup></label>
                  <input type="text" name='slug' id="slug" value='{{ $editPost->slug ? $editPost->slug : "" }}' class="form-control" placeholder="">
               </div>
               <div class="form-group">
                  <label for="exampleInputPassword1" class="text-uppercase">Chuyên mục <sup>*</sup></label>
                  <select name="id_category" id="">
                     <option value="">Chọn chuyên mục</option>
                     @foreach ($category as $value)
                     <option value="{{ $value->id }}">{{ $value->name }}</option>
                     @endforeach
                  </select>
               </div>
               <div class="form-group">
                  <label for="exampleInputPassword1" class="text-uppercase">Descripton <sup>*</sup></label>
                  <input type="text" name='description' value='{{ $editPost->description ? $editPost->description : "" }}' class="form-control" placeholder="">
               </div>
               <div class="form-group">
                  <label for="exampleInputPassword1" class="text-uppercase">Content <sup>*</sup></label>
                  <textarea name='content'>{{ $editPost->description ? $editPost->description : "" }}</textarea>
                  <script>
                     CKEDITOR.replace('content');
                  </script>
               </div>
               <div class="form-group">
                  <label for="exampleInputPassword1" class="text-uppercase">Image <sup>*</sup></label>
                  <input type="file" name='image' value='{{ $editPost->image ? $editPost->image : "" }}' class="form-control" placeholder="">
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
<script src="{{ asset('backend/js/jquery-1.8.3.min.js') }}"></script>

<script language="javascript">
            function ChangeToSlug()
            {
                var title, slug;
 
                //Lấy text từ thẻ input title 
                title = document.getElementById("title").value;
 
                //Đổi chữ hoa thành chữ thường
                slug = title.toLowerCase();
 
                //Đổi ký tự có dấu thành không dấu
                slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
                slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
                slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
                slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
                slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
                slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
                slug = slug.replace(/đ/gi, 'd');
                //Xóa các ký tự đặt biệt
                slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
                //Đổi khoảng trắng thành ký tự gạch ngang
                slug = slug.replace(/ /gi, "-");
                //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
                //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
                slug = slug.replace(/\-\-\-\-\-/gi, '-');
                slug = slug.replace(/\-\-\-\-/gi, '-');
                slug = slug.replace(/\-\-\-/gi, '-');
                slug = slug.replace(/\-\-/gi, '-');
                //Xóa các ký tự gạch ngang ở đầu và cuối
                slug = '@' + slug + '@';
                slug = slug.replace(/\@\-|\-\@|\@/gi, '');
                //In slug ra textbox có id “slug”
                document.getElementById('slug').value = slug;
            }
</script>