@extends('master-sign')
@section('content')
<link href="{{ URL::asset('css/styles.css') }}" type="text/css" rel="stylesheet">

    <!-- include the BotDetect layout stylesheet -->
    <link href="{{ captcha_layout_stylesheet_url() }}" type="text/css" rel="stylesheet">
<div class="list-server__title">
<img src="Web/images/text-dangky.png" alt="">
@if(Session::has('flag'))
<div {{-- class="alert alert-{{Session::get('flag')}}" --}}>{{Session::get('message')}}</div>
@endif
       <form action="{{route('quenmatkhau')}}" method="POST" role="form" class="form-login">
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
                    <input type="email" name='email' placeholder="Email của bạn là" id="email" required="" oninvalid="this.setCustomValidity('Email không được bỏ trống')" oninput="setCustomValidity('')">
                </div>
            </div>    
        {{-- <div class="form-login__input">
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
        </div> --}}
        <div class="form-login__submit dn-submit">
            <input type="submit" value="" class="icons-dn">
        </div>
    </form>
</div>
@endsection