@extends('master-sign')
@section('content')
<div class="list-server__title">
<img src="Web/images/text-dangnhap.png" alt="">
@if(Session::has('flag'))
<div class="alert alert-{{Session::get('flag')}}">{{Session::get('message')}}</div>
{{-- @if($errors->has('errorlogin'))
<div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	
    {{$errors->first('errorlogin')}}
</div> --}}
@endif
       <form action="{{route('dangnhap')}}" method="POST" role="form" class="form-login">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
       
        <div class="form-login__input">
               
            <div class="text--label">
                <label for="tk">Tài khoản</label>
            </div>
            <div class="text-input">
                <input type="text" placeholder="Tài khoản" class="taikhoan" name= "taikhoan"id="tk" required="" oninvalid="this.setCustomValidity('Tài khoản không được bỏ trống')" oninput="setCustomValidity('')">
                <span class="error"></span>
            </div>
        </div>
        <div class="form-login__input">
            <div class="text--label">
                <label for="mk">Mật khẩu</label>
            </div>
            <div class="text-input">
                <input type="password" placeholder="Mật khẩu" name= "matkhau"id="mk" required="" oninvalid="this.setCustomValidity('Mật khẩu không được bỏ trống')" oninput="setCustomValidity('')">

                <span class="error"></span>
            </div>
        </div>
        <div class="form-login__submit submit-dn">
            <input type="submit" value="" class="icons-dangnhap">
        </div>
        <a href="{{ route('dangnhap_facebook')}}" class="btn btn-primary">Facebook Login</a>
        <div class="form-login__text text-kul">
            <a class="text-1" href="{{route('dangky')}}" title="Bạn chưa có tài khoản KUL?">Bạn chưa có tài khoản KUL?</a>
            <a class="text-2" href="{{route('dangky')}}" title="Đăng ký miễn phí! ">Đăng ký miễn phí! |</a>
            <a class="text-3" href="{{route('quenmatkhau')}}" title="Quên mật khẩu ">Quên mật khẩu </a>
        </div>
    </form>
</div>
@endsection