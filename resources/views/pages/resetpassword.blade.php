@extends('master-sign')
@section('content')
<link href="{{ URL::asset('css/styles.css') }}" type="text/css" rel="stylesheet">

    <!-- include the BotDetect layout stylesheet -->
    <link href="{{ captcha_layout_stylesheet_url() }}" type="text/css" rel="stylesheet">
<div class="list-server__title">
<img src="Web/images/text-dangky.png" alt="">

@if ($errors->any())
       <div class="alert alert-{{Session::get('flag')}}">{{Session::get('message')}}</div>
            @foreach ($errors->all() as $error)
            <div>{{$error}}</div>
            @endforeach
@endif
       <form url="{{url('resetmatkhau')/* route('resetmatkhau') *//* ($code->url) */}}" method="POST" role="form" class="form-login">
        {{-- Với form method POST cần có token --}}
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <input type="hidden" value="{{ (request()->get('code')) }}" name="code">
        {{-- <div class="form-login__input">
            <div class="text--label">
                <label for="tk">Tài khoản</label>
            </div>
            <div class="text-input">
                <input type="text" name="taikhoan" placeholder="Tài khoản của bạn" class="taikhoan" id="taikhoan" required="" oninvalid="this.setCustomValidity('Tài khoản không được bỏ trống')" oninput="setCustomValidity('')" value='{{old('taikhoan')}}'>
            </div>
        </div>   --}}
        {{-- <div class="form-login__input">
            <div class="text--label">
                <label for="mk">Email</label>
            </div>
            <div class="text-input">
                <input type="email" name='email' placeholder="Email của bạn là" id="email" required="" oninvalid="this.setCustomValidity('Email không được bỏ trống')" oninput="setCustomValidity('')">
            </div>
        </div>  --}}   
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
        <div class="form-login__submit dn-submit">
            <input type="submit" value="" class="icons-dn">
        </div>
    </form>
</div>
@endsection