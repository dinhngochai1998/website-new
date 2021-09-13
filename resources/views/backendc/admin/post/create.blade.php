@extends('layouts.backendc')
@section('content')
<div class="wrapper">

    @include('backendc.includes.navbar-top', [
    'add' => 'Post',
    'url' => route('post.select')
    ])

    <div class="content-wrapper" style="min-height: 1602px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6" style="padding:30px;">
                        <h1 class="float-left mr-5"><i class="nav-icon fas fa-user"></i> Post Add</h1>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <form novalidate="novalidate" method="POST" action="{{ route('post.create') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputName">Title</label>
                                    <input type="text" onkeyup="ChangeToSlug()" name="title" value="" id="title" class="form-control" required />
                                    @if ($errors->has('title'))
                                    <div class="mt-1 text-red-500">
                                        {{ $errors->first('title') }}
                                    </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="inputName">Slug</label>
                                    <input type="text" onkeyup="ChangToSlug()" name="slug" value="" id="slug" class="form-control" required />
                                    @if ($errors->has('slug'))
                                    <div class="mt-1 text-red-500">
                                        {{ $errors->first('slug') }}
                                    </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="inputName">Chuyên mục</label>
                                    <select name="id_category" id="">
                                        <option value="">Chọn chuyên mục</option>
                                        @foreach ($categories as $value)

                                        <option value="{{ $value->id }}">{{ $value->name }} </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="inputDescription">Description</label>
                                    <input type="type" name="description" value="" id="inputName" class="form-control" required />
                                    @if ($errors->has('description'))
                                    <div class="mt-1 text-red-500">
                                        {{ $errors->first('description') }}
                                    </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="inputDescription">Content</label>
                                    <textarea name='content'></textarea>
                                    <script>
                                        CKEDITOR.replace('content');
                                    </script>
                                    @if ($errors->has('content'))
                                    <div class="mt-1 text-red-500">
                                        {{ $errors->first('content') }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <div class="col-md-6">
                        <div class="card card-secondary">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputFile">Image</label>
                                    <div class="input-group">
                                        <input type="file" id="adBanner" class="form__file-control" name="image" />
                                    </div>
                                    @if ($errors->has('image'))
                                    <div class="mt-1 text-red-500">
                                        {{ $errors->first('image') }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <input type="submit" value="Create Post" class="btn btn-success float-left mr-2" />
                        <a href="#" class="btn btn-secondary float-left">Cancel</a>
                    </div>
                </div>
            </form>
        </section>
        <!-- /.content -->
    </div>

</div>
@endsection
<script src="{{ asset('backend/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('backend/js/jquery-1.8.3.min.js') }}"></script>

<script language="javascript">
    function ChangeToSlug() {
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