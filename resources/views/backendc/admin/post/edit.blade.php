@extends('layouts.backendc')
@section('content')
<div class="wrapper">

    @include('backendc.includes.navbar-top', [
    'edit' => 'Post',
    'id' => $editPost->id,
    'url' => route('post.select')
    ])

    @include('backendc.components.alert')

    <div class="content-wrapper" style="min-height: 1602px;">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6" style="padding:30px;">
                        <h1 class="float-left mr-5"><i class="nav-icon fas fa-user"></i> Role Edit</h1>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <form method="POST" action="{{ route('post.update') }}" enctype="multipart/form-data">
                @csrf
                {{ method_field('PATCH') }}
                <input type="hidden" name="id" value="{{ $editPost->id }}" />
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputName">Title</label>
                                    <input type="text" onkeyup="ChangeToSlug()" name="title" value="{{ $editPost->title }}" id="title" class="form-control" required />
                                    @if ($errors->has('title'))
                                    <div class="mt-1 text-red-500">
                                        {{ $errors->first('title') }}
                                    </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="inputName">Slug</label>
                                    <input type="text" onkeyup="ChangToSlug()" name="slug" value="{{ $editPost->slug }}" id="slug" class="form-control" required />
                                    @if ($errors->has('slug'))
                                    <div class="mt-1 text-red-500">
                                        {{ $errors->first('slug') }}
                                    </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="inputName">Chuy??n m???c</label>
                                    <select name="id_category" id="">
                                        <option value="">Ch???n chuy??n m???c</option>
                                        @foreach ($getCategory as $value)

                                        <option value="{{ $value->id }}">{{ $value->name }} </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="inputDescription">Description</label>
                                    <input type="type" name="description" value="{{ $editPost->description }}" id="inputName" class="form-control" required />
                                    @if ($errors->has('description'))
                                    <div class="mt-1 text-red-500">
                                        {{ $errors->first('description') }}
                                    </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="inputDescription">Content</label>
                                    <textarea name='content'>{{ $editPost->description ? $editPost->description : "" }}</textarea>
                                    <script>
                                        CKEDITOR.replace('content');
                                    </script>
                                </div>
                                <div class="form-group">
                                    <label for="inputName">Schedule</label>
                                    <select name="status_schedule" id="">
                                        <option value="public">Public</option>
                                        <option value="schedule">Schedule</option>
                                        <option value="disable">Disable</option>
                                    </select>
                                </div>
                                <label for="birthdaytime">Ch???n gi??? ????ng b??i</label>
                                <input type="datetime" value="{{ $editPost->publish_at }}" id="" name="publish_at">
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
                                        <input type="file" value="{{ old('image') ?? $editPost->image}}" id="adBanner" class="form__file-control" name="image" />
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
                        <input type="submit" value="Edit Post" class="btn btn-success float-left mr-2" />
                        <a href="#" class="btn btn-secondary float-left">Cancel</a>
                    </div>
                </div>
            </form>
        </section>
        <!-- /.content -->
    </div>

</div>

@endsection


<script language="javascript">
    function ChangeToSlug() {
        var title, slug;

        //L???y text t??? th??? input title 
        title = document.getElementById("title").value;

        //?????i ch??? hoa th??nh ch??? th?????ng
        slug = title.toLowerCase();

        //?????i k?? t??? c?? d???u th??nh kh??ng d???u
        slug = slug.replace(/??|??|???|???|??|??|???|???|???|???|???|??|???|???|???|???|???/gi, 'a');
        slug = slug.replace(/??|??|???|???|???|??|???|???|???|???|???/gi, 'e');
        slug = slug.replace(/i|??|??|???|??|???/gi, 'i');
        slug = slug.replace(/??|??|???|??|???|??|???|???|???|???|???|??|???|???|???|???|???/gi, 'o');
        slug = slug.replace(/??|??|???|??|???|??|???|???|???|???|???/gi, 'u');
        slug = slug.replace(/??|???|???|???|???/gi, 'y');
        slug = slug.replace(/??/gi, 'd');
        //X??a c??c k?? t??? ?????t bi???t
        slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
        //?????i kho???ng tr???ng th??nh k?? t??? g???ch ngang
        slug = slug.replace(/ /gi, "-");
        //?????i nhi???u k?? t??? g???ch ngang li??n ti???p th??nh 1 k?? t??? g???ch ngang
        //Ph??ng tr?????ng h???p ng?????i nh???p v??o qu?? nhi???u k?? t??? tr???ng
        slug = slug.replace(/\-\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-/gi, '-');
        slug = slug.replace(/\-\-/gi, '-');
        //X??a c??c k?? t??? g???ch ngang ??? ?????u v?? cu???i
        slug = '@' + slug + '@';
        slug = slug.replace(/\@\-|\-\@|\@/gi, '');
        //In slug ra textbox c?? id ???slug???
        document.getElementById('slug').value = slug;
    }
</script>