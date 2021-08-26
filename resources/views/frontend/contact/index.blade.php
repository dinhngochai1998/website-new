@extends('layouts.frontend')

<main id="contact-wrapper">
    <div class="container-master">
        <div class="box-contact">
            <div class="contact-map">
                <div class="mapouter">
                    <iframe id="gmap_canvas" src="https://maps.google.com/maps?q=eurowindow%20multi&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                </div>
            </div>
            <div class="contact-form">
                <h1 class="contact-title">Liên hệ</h1>
                <p>Nếu bạn có câu hỏi hoặc yêu cầu thực hiện dự án, xin vui lòng điền đủ các thông tin dưới đây</p>
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    <span style="color: red;">{{ session('status') }}</span>
                </div>
                @endif
                <br>
                <form action="{{ route('contact.create') }}" method='POST' enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="row-input">
                        <div class="box-input">
                            <label>Tên <span>*</span></label>
                            <input type="text" name="name">
                            @error('name')
                            <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="box-input">
                            <label>Điện thoại <span>*</span></label>
                            <input type="text" name="tel">
                            @error('tel')
                            <div class="error">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="box-input">
                        <label>Email <span>*</span></label>
                        <input type="email" name="email">
                        @error('email')
                        <div class="error" style="color: red; padding-top:5px;">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="box-input">
                        <label>Nội dung <span>*</span></label>
                        <textarea name="content" id=""></textarea>
                        @error('content')
                        <div class="error" style="color: red; padding-top:5px;">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="btn-send">
                        <button type="submit" class="btn-submit"><span>Gửi mẫu</span></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
<div class="action-fixed">
    <ul>
        <li><a href="" title=""><img src="images/icon/s5.png" alt=""></a></li>
        <li><a href="" title=""><img src="images/icon/s4.png" alt=""></a></li>
        <li><a href="" title=""><img src="images/icon/s3.png" alt=""></a></li>
        <li><a href="" title=""><img src="images/icon/s2.png" alt=""></a></li>
        <li><a href="" title=""><img src="images/icon/s1.png" alt=""></a></li>
    </ul>
</div>