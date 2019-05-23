<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <title>Game Of Dragons</title>
        <link rel="stylesheet" type="text/css" href="Web/css/style.css"/>
        <link rel="stylesheet" type="text/css" href="Web/Skin/halloween-2018/css/style.css" />
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <meta name ='csrf-token' content='{{csrf_token()}}'>
    </head>
    <body>
        <!-- Start Project -->
            <div class="wapper">
                <!-- Sub wapper -->
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <!-- Header -->
                            <header class="c-header">
                                <nav class="menu-top">
                                    <ul>
                                        <li class="active"><a href="{{route('trangchu')}}" title="Home" class="icons-home">Home</a></li>
                                        <li><a href="{{route('list',1)}}" title="Tin tức" class="icons-tintuc">Tin tức</a></li>
                                        <li><a href="{{route('list',2)}}" title="Sự kiện" class="icons-sukien">Sự kiện</a></li>
                                        <li class="icons-logo">
                                            <a href="#" title="Game of dragons" >
                                                <img src="Web/images/logo.png" alt="">
                                            </a>
                                        </li>
                                        <li><a href="{{route('list',3)}}" title="Hướng dẫn" class="icons-huongdan">Hướng dẫn</a></li>
                                        <li><a href="#" title="Fanpage" class="icons-fanpage">Fanpage</a></li>
                                        <li><a href="#" title="Giftcode" class="icons-giftcode">Giftcode</a></li>
                                    </ul>
                                </nav>
                                <a href="https://www.youtube.com/embed/jid2A7ldc_8?autoplay=1" class="various fancybox icons-play " ></a>
                            </header>
                            <!-- End Header -->
                            <!-- Main -->
                            <main class="c-main c-main-home">
                                @if(Session::has('taikhoan'))
                                <div class="box-login">
                                        <a href="#" title="Chơi Ngay" class="icons-choingay">Chơi Ngay</a>
                                        <div class="box-login__1">
                                            <a href="#" title="Nạp thẻ" class="icons-napthe">Nạp thẻ</a>
                                        <a href="{{route('dangky')}}" title="Đăng ký" class="icons-dangky">Đăng ký</a>
                                        </div>
                                        <div class="box-login__2">
                                            <!-- Sau khi login -->
                                            <div class="after-login">
                                                <div class="form-login__input">
                                                    <p class="first-child">Xin chào</p>
                                                    <p class="last-child">{{Session::get('taikhoan')}}</p>
                                                </div>
                                                <div class="form-login__submit">
                                                    <a href="#" title="Chọn máy chủ" class="icons-chonmaychu">Chọn máy chủ</a>
                                                </div>
                                                <div class="form-login__text">
                                                    <a href="#" title="Quên mật khẩu"> <span class="icons-i"></span> Thông tin tài khoản</a> | <a href="{{route('dangxuat')}}" title="thoát">thoát</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                <div class="box-login">
                                        <a href="#" title="Chơi Ngay" class="icons-choingay">Chơi Ngay</a>
                                        <div class="box-login__1">
                                            <a href="#" title="Nạp thẻ" class="icons-napthe">Nạp thẻ</a>
                                            <a href="{{route('dangky')}}" title="Đăng ký" class="icons-dangky">Đăng ký</a>
                                        </div>
                                        <div class="box-login__2">
                                            <!-- Trước khi login -->
                                            <form action="{{route('dangnhap_index')}}" method="POST" role="form" id='login-form' class="form-login">
                                                {{csrf_field()}}
                                                <div class="form-login__input">
                                                <input type="text" placeholder="Tài khoản" class="taikhoan" name= "taikhoan"id="tk" required="" oninvalid="this.setCustomValidity('Tài khoản không được bỏ trống')" oninput="setCustomValidity('')" value="{{old('taikhoan')}}">
                                                        <input type="password" placeholder="Mật khẩu" name= "matkhau"id="mk" required="" oninvalid="this.setCustomValidity('Mật khẩu không được bỏ trống')" oninput="setCustomValidity('')">
                                                </div>
                                                <div class="form-login__submit">
                                                    <input type="submit" value="" class="icons-dangnhap" id='login'>
                                                </div> 
                                                <div class="form-login__text">
                                                        @if(Session::has('flag'))
                                                        <div class="alert alert-{{Session::get('flag')}}">{{Session::get('message')}}</div>
                                                        {{-- @if($errors->has('errorlogin'))
                                                        <div class="alert alert-danger">
                                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                            
                                                            {{$errors->first('errorlogin')}}
                                                        </div> --}}
                                                        
                                                        @endif
                                                        {{-- <div>{{Session::get('taikhoan')}}</div> --}}
                                                    <a class="not-remember-password" href="{{route('quenmatkhau')}}" title="Quên mật khẩu">Quên mật khẩu</a>
                                                </div>
                                            </form>
                                        </div>
                                        
                                    </div>
                                    @endif
                                    <div class="owl-slide owl-carousel">
                                        <div class="item">
                                            <a href="#" title=""><img src="Web/images/banner1.jpg" alt="Banner 1"></a>
                                        </div>
                                        <div class="item">
                                            <a href="#" title=""><img src="Web/images/banner2.jpg" alt="Banner 1"></a>
                                        </div>
                                        <div class="item">
                                            <a href="#" title=""><img src="Web/images/banner1.jpg" alt="Banner 1"></a>
                                        </div>
                                        <div class="item">
                                            <a href="#" title=""><img src="Web/images/banner2.jpg" alt="Banner 1"></a>
                                        </div>
                                    </div>