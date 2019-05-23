<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <title>Game Of Dragons</title>
        <link rel="stylesheet" type="text/css" href="Web/css/style.css"/>
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <link href="{{ captcha_layout_stylesheet_url() }}" type="text/css" rel="stylesheet">
    </head>
    <body class="body-listsv">
        <!-- Start Project -->
            <div class="wapper wapper-server">
                 <div class="container">
                     <div class="row">
                         <div class="col-xs-12">
                             <div class="header-sv">
                                 <a href="#" title="Game of Dragons"  class="logo">
                                     <img src="Web/images/logo.png" alt="">
                                 </a>
                                
                             </div>
                             <div class="list-server">
                                 <ul class="list-server__item">
                                     <li class="first-child">
                                         <a href="{{route('trangchu')}}" title="Trang chủ" class="icons-homesv">Trang chủ</a>
                                     </li>
                                     <li class="ntn-child">
                                         <a href="#" title="FanPage" class="icons-fan">FanPage</a>
                                     </li>
                                     <li class="last-child">
                                          <a href="#" title="Nạp thẻ" class="icons-nap">Nạp thẻ</a>
                                     </li>
                                 </ul>