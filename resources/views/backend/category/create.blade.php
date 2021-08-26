@extends('layouts.backend')

@section('content')
<section class="login-block">
    <div class="container ">
        <div class="row ">
            <div class="col-md-4 col-md-offset-4 login-sec">
                <h2 class="text-center">Category</h2>
                <!-- @include('components.alert') -->
                <form class="login-form" action="{{ route('category.create') }}" method='POST' enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="text-uppercase">Name <sup>*</sup></label>

                        <input type="text" onkeyup="ChangeToSlug();" id="name" name='name' class="form-control" placeholder="">
                        <span id="error"></span>
                        @error('name')
                        <div class="error" style="color:red;">{{ $message }}</div>
                        @enderror
                        <span id="error-name"></span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1" class="text-uppercase">Slug <sup>*</sup></label>
                        <input type="text" id="slug" name='slug' class="form-control" placeholder="">
                        @error('slug')
                        <div class="error" style="color:red;">{{ $message }}</div>
                        @enderror
                        <span id="error-slug"></span>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1" class="text-uppercase">Parent<sup>*</sup></label>
                        <select name="parent_id" id="">
                        <option value="">Chọn chuyên mục</option>
                            @foreach ($category as $value)
                                
                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                            @endforeach                      
                        </select>
                    </div>
                    <div class="form-check col-md-offset-4">
                        <button type="submit" data-url="" id="createCategory" class="btn btn-primary">Thêm</button>
                    </div>
                </form>
</section>

@endsection
<script src="{{ asset('backend/js/jquery-1.8.3.min.js') }}"></script>
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
<script language="javascript">
    function ChangeToSlug() {
        var name, slug;

        //Lấy text từ thẻ input title 
        name = document.getElementById("name").value;

        //Đổi chữ hoa thành chữ thường
        slug = name.toLowerCase();

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