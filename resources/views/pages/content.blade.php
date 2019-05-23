@extends('master-child')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-10 col-xs-push-1">
            <!-- breadcrumb title -->
            <div class="box-news__title">
                <div class="icons-title"></div>
                <h2 class="box-news__title--color">Cuộc đua bắt đầu .</h2>
                <ol class="breadcrumb breadcrumb-style">
                    <li>
                        <a href="{{route('trangchu')}}"><span class="icons-minihome"></span>Trang chủ</a>
                    </li>
                    @foreach($danhmuc as $dm)
                    <li>
                        <a href="{{route('list',$dm->iddanhmucbaiviet)}}">{{$dm->tendanhmuc}}</a>
                    </li>@endforeach
                    @foreach($baiviet as $tin)
                    <li class="active">{{$tin->title}}</li>
                    <li>{{$tin->ngaydang}}</li>
                    @endforeach
                </ol>
            </div>
            <!-- breadcrumb title -->
            @foreach($baiviet as $tin)
              <h1 class="h1-content">
                    {{$tin->title}}
                </h1>
                <!-- Static Main -->
                    <div class="StaticMain">
                        {{$tin->noidung}}
                    </div>
            @endforeach
                <!-- End Static Main -->
                <!-- Tin Khac -->
                <div class="order-new">
                    @foreach($baiviet as $tin)
                    <h6 class="order-new__h6">Tin Khác <a href="{{route('list',$tin->iddanhmucbaiviet)}}" class="icons-add-orther">Xem thêm</a></h6>
                    @endforeach
                    <nav class="nav-order-new">
                        @foreach($tinkhac as $tin)
                        <ul>
                            <li><a href="{{route('content',$tin->idbaiviet)}}" title="{{$tin->tilte}}">{{$tin->title}} <span>{{$tin->ngaydang}}</span></a> </li>
                            
                        </ul>
                        @endforeach
                    </nav>
                 </div>
                <!-- End Tin Khac -->
        </div>
    </div>
</div>
@endsection