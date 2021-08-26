@extends('layouts.frontend')

@section('content')

<form novalidate="novalidate" action="{{ route('customerpost.update') }}" method="POST" enctype="multipart/form-data">
    {{ method_field('PATCH') }}
    {{ csrf_field() }}
    <div class="container">
        @include('components.alert')
        
        <hr>
        <div class="form-group">
            <label for="exampleInputEmail1"><b>Title</b></label>
            <input type="text" onkeyup="ChangeToSlug()" id="title" value="{{ $editCustomerPost->title }}" placeholder="Nhap Title" name="title" required>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1"><b>Slug</b></label>
            <input type="text" id="slug" value="{{ $editCustomerPost->slug }}" placeholder="Nhập Slug" name="slug" required>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1" class="text-uppercase">Chuyên mục <sup>*</sup></label>

            <select name="id_category" id="">

                <option value="">Chọn chuyên mục</option>
                @foreach ($getCategory as $value)
                <option value="{{ $value->id }}">{{ $value->name }}</option>

                @endforeach
            </select>

        </div>
        <div class="form-group">
            <label for="exampleInputPassword1" class="text-uppercase">Content<sup>*</sup></label>
            <textarea name='content' value="" >{{ $editCustomerPost->content }}</textarea>
            <script>
                CKEDITOR.replace('content',);
            </script>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1"><b>Image</b></label>
            <input type="file" value="{{ $editCustomerPost->image }}" name="image" required>
        </div>
        <br>
        <br>
        <div class="form-group">
            <label for="exampleInputEmail1"><b>Description</b></label>
            <input type="text" value="{{ $editCustomerPost->description }}" placeholder="Nhập description" name="description" required>
        </div>
        <input type="hidden" name="customer_status" placeholder="" value="2">
        <input type="hidden" name="status" placeholder="" value="2">
        <div class="clearfix">
            <button type="submit" class="signupbtn">Gửi Bài Đăng</button>
        </div>
    </div>
</form>
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