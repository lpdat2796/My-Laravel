@extends('master-sign')
@section('content')
<link href="{{ URL::asset('css/styles.css') }}" type="text/css" rel="stylesheet">

    <!-- include the BotDetect layout stylesheet -->
    <link href="{{ captcha_layout_stylesheet_url() }}" type="text/css" rel="stylesheet">
<div class="list-server__title">

    {{-- Thông báo lỗi --}}
    @if(count($errors)>0)
    <div class="alert alert-danger">
        @foreach($errors->all() as $err)
        {{$err}}
        @endforeach
    </div>
    @endif()

    {{-- Đặt session thông báo --}}
    @if(Session::has('thongbao'))
    <div class="alert alert-success">{{Session::get('thongbao')}}</div>
    @endif
    @if(Session::has('thanhcong'))
    <div class="alert alert-success">{{Session::get('thanhcong')}}</div>
    @endif


<img src="Web/images/text-dangky.png" alt="">
       <form action="" method="POST" role="form" class="form-login" id='dangky'>
        {{-- Với form method POST cần có token --}}
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="form-login__input">
            <div class="text--label">
                <label for="tk">Tài khoản</label>
            </div>
            <div class="text-input">
                <input type="text" name="taikhoan" placeholder="Tài khoản của bạn" class="taikhoan" id="taikhoan" required="" oninvalid="this.setCustomValidity('Tài khoản không được bỏ trống')" oninput="setCustomValidity('')" value='{{old('taikhoan')}}'>
            </div>
        </div>
        <div class="form-login__input">
                <div class="text--label">
                    <label for="mk">Email</label>
                </div>
                <div class="text-input">
                <input type="email" name='email' placeholder="Email của bạn là" id="email" required="" oninvalid="this.setCustomValidity('Email không được bỏ trống')" oninput="setCustomValidity('')" value="{{old('email')}}">
                </div>
            </div>  
        <div class="form-login__input">
            <div class="text--label">
                <label for="mk">Mật khẩu</label>
            </div>
            <div class="text-input">
                <input type="password" name='matkhau' placeholder="Mật khẩu của bạn" id="matkhau" required="" oninvalid="this.setCustomValidity('Mật khẩu không được bỏ trống')" oninput="setCustomValidity('')">
            </div>
        </div>
         <div class="form-login__input">
            <div class="text--label">
                <label for="mk">Xác nhận mật khẩu</label>
            </div>
            <div class="text-input">
                <input type="password" name='matkhaure' placeholder="Xác nhận mật khẩu" id="matkhaure" required="" oninvalid="this.setCustomValidity('Mật khẩu không được bỏ trống')" oninput="setCustomValidity('')">
            </div>
        </div>  
        <div class="form-login__input">
            <div class="text--label">
                <label for="mxn">Mã xác nhận </label>
            </div>
            <div class="text-input w-capcha">
                <input type="text" placeholder="Nhập mã" id="CaptchaCode" name="CaptchaCode" required="" oninvalid="this.setCustomValidity('Mã xác nhận không được bỏ trống')" oninput="setCustomValidity('')">
                <div class="col-md-6 captcha">
                    <span>{!! captcha_image_html('ContactCaptcha') !!}</span>
                </div>
                @if ($errors->has('ContactCaptcha'))
                <span class="help-block">
                    <strong>{{ $errors->first('ContactCaptcha') }}</strong>
                </span>
                @endif
            </div>
        </div>
        {{-- <div class="form-group{{ $errors->has('CaptchaCode') ? ' has-error' : '' }}">
            <label class="col-md-4 control-label"></label>

            <div class="col-md-6">
                {!! captcha_image_html('RegisterCaptcha') !!}
                <input type="text" class="form-control" name="CaptchaCode" id="CaptchaCode">

                @if ($errors->has('CaptchaCode'))
                    <span class="help-block">
                        <strong>{{ $errors->first('CaptchaCode') }}</strong>
                    </span>
                @endif
            </div>
        </div> --}}
        <div class="form-login__submit dn-submit">
            <input type="submit" value="" class="icons-dn">
        </div>
        <div class="form-login__text read-document">
            <input type="checkbox" name="" id="terms">
            <p class="text-4">Tôi đã đọc kỹ & hoàn toàn đồng ý với các <a href="#" class="text-dieukhoan" title="Điều khoản sử dụng">Điều khoản sử dụng</a> của Kul.vn</p>
        </div>
    </form>
</div>
@endsection