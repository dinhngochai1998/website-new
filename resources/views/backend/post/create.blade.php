@extends('layouts.backend')

@section('content')
<section class="login-block">
   <div class="container ">
      <div class="row ">
         <div class="col-md-10  login-sec">
            <h2 class="text-center">Post</h2>
            <form class="login-form" action='{{ route("post.create") }} ' method='POST' enctype="multipart/form-data">
               {{ csrf_field() }}
               <div class="form-group">
                  <label for="exampleInputEmail1" class="text-uppercase">Title <sup>*</sup></label>
                  <input type="text"  onkeyup="ChangeToSlug();" id="title" name='title' value="{{ old('title') }}" class="form-control" placeholder="">
                  @error('title')
                  <div class="error" style="color:red;">{{ $message }}</div>
                  @enderror
               </div>
               <div class="form-group">
                  <label for="exampleInputPassword1" class="text-uppercase">Chuyên mục <sup>*</sup></label>
                  <select name="id_category" id="">
                     <option value="">Chọn chuyên mục</option>
                     @foreach ($categories as $value)
                     <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                        
                     @endforeach
                  </select>
               </div>
               <div class="form-group">
                  <label for="exampleInputPassword1" class="text-uppercase">Slug <sup>*</sup></label>
                  <input type="text" id="slug" name='slug' class="form-control" placeholder="">
                  @error('slug')
                  <div class="error" style="color:red;">{{ $message }}</div>
                  @enderror
               </div>
               <div class="form-group">
                  <label for="exampleInputPassword1" class="text-uppercase">Content <sup>*</sup></label>
                  <textarea name='content'></textarea>
                  <script>
                     CKEDITOR.replace('content');
                  </script>
                  @error('content')
                  <div class="error" style="color:red;">{{ $message }}</div>
                  @enderror
               </div>
               <div class="form-group">
                  <label for="exampleInputPassword1" class="text-uppercase">Image </label>
                  <input type="file" name='image' value='' class="form-control" placeholder="">
                  @error('image')
                  <div class="error" style="color:red;">{{ $message }}</div>
                  @enderror
               </div>
               <div class="form-group">
                  <label for="exampleInputPassword1" class="text-uppercase">Descripton <sup>*</sup></label>
                  <input type="text" name='description' value='{{ old('description') }}' class="form-control" placeholder="">
                  @error('description')
                  <div class="error" style="color:red;">{{ $message }}</div>
                  @enderror
               </div>
               <input type="hidden" name="customer_status" value="1">

               <div class="form-check col-md-offset-4">
                  <!-- <label class="form-check-label">
         <input type="checkbox" class="form-check-input">
         <small>Remember Me</small>
         </label> -->
                  <button type="submit" id="taget-slug" class="btn btn-login float-right">Thêm</button>
               </div>
            </form>
</section>

@endsection

<script src="{{ asset('backend/js/jquery-1.8.3.min.js') }}"></script>

<!-- <script>
   /* Encode string to slug */
   function convertToSlug(str) {

      //replace all special characters | symbols with a space


      // trim spaces at start and end of string



      // replace space with dash/hyphen
      str = str.toLowerCase();
      str = str.replace(/ /g, '-').replace(/[^\w-]+/g, '');

      $("#slug-text").val(str);
      //return str;
   }
</script> -->

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