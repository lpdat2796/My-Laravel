@extends('master-child')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-10 col-xs-push-1">
            <div class="c-main-bg">
                <div class="box-news__title">
                    <div class="icons-title"></div>
                    <h2 class="box-news__title--color">Cuộc đua bắt đầu .</h2>

                    <ol class="breadcrumb breadcrumb-style">
                        <li>
                            <a href="{{route('trangchu')}}"><span class="icons-minihome"></span>Trang chủ</a>
                        </li>
                        <li>@foreach($dm_baiviet as $dm)
                            <a href="{{route('list',$dm->iddanhmucbaiviet)}}">{{$dm->tendanhmuc}}</a>
                        </li>@endforeach
                        <li class="active"></li>
                        <li></li>
                    </ol>

                    
                </div>
                <!-- Static List News -->
                 @foreach($new_baiviet as $tin)
                <div class="tab-content-home">
                    <div class="media">
                        <div class="media-left media-home">
                            <a href="{{route('content',$tin->idbaiviet)}}">
                                <img class="media-object" src="Web/{{$tin->anh}}" alt="...">
                            </a>
                        </div>
                        <div class="media-body content-media-body">
                            <h4 class="media-heading">
                                <a href="{{route('content',$tin->idbaiviet)}}" title="{{$tin->title}}">

                            {{$tin->title}}</a><span class="date">{{$tin->ngaydang}}</span>                                            </h4>
                                                                        

                            {{$tin->tomtat}}
                        </div>
                </div>
                 @endforeach
                <!-- Phan Trang -->
                <!-- Pagination -->
                <nav class="nav-pagination">
                    <ul class="pagination">
                     {{$new_baiviet->links()}}
                    </ul>
                </nav>
            </div>
            <!-- End Static List News -->
        </div>
    </div>
</div>
@endsection