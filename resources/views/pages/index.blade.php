@extends('master')
@section('content')
<div class="c-article">
    <div role="tabpanel">
        <!-- Nav tabs -->
        <ul class="ul-tab-new" role="tablist">
            <li role="presentation" class="ul-tab-new__tt active" id ="1">
                <a href="#tintuc" aria-controls="tintuc" role="tab" data-toggle="tab" class="icons-tt">Tin tức</a>
            </li>
            <li role="presentation" class="ul-tab-new__sk" id ="2">
                <a href="#sukien" aria-controls="sukien" role="tab" data-toggle="tab" class="icons-sk">Sự kiện</a>
            </li>
            <li role="presentation" class="ul-tab-new__hd" id ="3">
                <a href="#huongdan" aria-controls="huongdan" role="tab" data-toggle="tab" class="icons-hd">Hướng dẫn</a>
            </li>
            
        <li class="last-child"><a href="" title="Xem thêm" class="icons-add" id="link1"></a></li>
        </ul>
           

        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active" id="tintuc">
                <ul class="ul-tab-content">
                    <li class="first-child">
                        <div class="avata">
                            <img src="Web/{{$new_baiviet1->anh}}" alt="">
                        </div>
                        <div class="description">
                            <h3 class="description__h3"><a href="{{route('content',$new_baiviet1->idbaiviet)}}" title="{{$new_baiviet1->title}}">{{$new_baiviet1->title}}</a><span>{{$new_baiviet1->ngaydang}}</span></h3>
                            {{$new_baiviet1->tomtat}}
                        </div>
                        
                    </li>
                        @foreach($new_baiviet as $tin)
                    <li> 
                        <span class="icons-muiten"></span>
                        <a href="{{route('content',$tin->idbaiviet)}}" title="{{$tin->title}}">{{$tin->title}}<span>{{$tin->ngaydang}}</span></a>
                    </li>
                   @endforeach
                </ul>
            </div>
            <div role="tabpanel" class="tab-pane fade " id="sukien">
                <ul class="ul-tab-content">
                    <li class="first-child">
                        <div class="avata">
                            <img src="Web/{{$event_baiviet1->anh}}" alt="">
                        </div>
                        <div class="description">
                            <h3 class="description__h3"><a href="{{route('content',$event_baiviet1->idbaiviet)}}" title="{{$event_baiviet1->title}}">{{$event_baiviet1->title}}</a><span>{{$event_baiviet1->ngaydang}}</span></h3>
                            {{$event_baiviet1->tomtat}}
                        </div>
                    </li>
                    @foreach($event_baiviet as $event)
                    <li>
                        <span class="icons-muiten"></span>
                        <a href="{{route('content',$event->idbaiviet)}}" title="{{$event->title}}">{{$event->title}}<span>{{$event->ngaydang}}</span></a>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="huongdan">
                <ul class="ul-tab-content">
                    <li class="first-child">
                        <div class="avata">
                            <img src="Web/{{$huongdan_baiviet1->anh}}" alt="">
                        </div>
                        <div class="description">
                            <h3 class="description__h3"><a href="{{route('content',$huongdan_baiviet1->idbaiviet)}}" title="{{$huongdan_baiviet1->title}}">{{$huongdan_baiviet1->title}}</a><span>{{$huongdan_baiviet1->ngaydang}}</span></h3>
                            {{$huongdan_baiviet1->tomtat}}
                        </div>
                    </li>
                    @foreach($huongdan_baiviet as $huongdan)
                    <li>
                        <span class="icons-muiten"></span>
                        <a href="{{route('content',$huongdan->idbaiviet)}}" title="{{$huongdan->title}}">{{$huongdan->title}}<span>{{$huongdan->ngaydang}}</span></a>
                    </li>
                    @endforeach
                    
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="c-tuong">
<!-- Flash -->
<div class="zyShow mt30">
    <ul class="zyTab">
        <li id="z1" class="cur">
            <a href="javascript:;" title="" class="icons-anhhung">
                <span class="text"></span>
            </a>
        </li>
        <li id="z2">
            <a href="javascript:;" title="" class="icons-thucuoi">
                 <span class="text"></span>
            </a>
        </li>
        <li id="z3">
            <a href="javascript:;" title="" class="icons-rong">
                 <span class="text"></span>
            </a>
        </li>
        <li id="z4">
            <a href="javascript:;" title="" class="icons-kynang">
                 <span class="text"></span>
            </a>
        </li>
    </ul>
    <div class="zyTag">
        <div class="zyTac">
            <div id="box0" class="yx zyList">
                <div class="Focus_list">
                    <div class="tac cur">
                        <span class="zy_txt">
                             <img src="Web/images/tuong/hero/h1-text.png">
                        </span>
                        <div class="jn_img">
                             <img src="Web/images/tuong/hero/h1-img.png">
                        </div>
                    </div>
                    <div class="tac">
                        <span class="zy_txt">
                             <img src="Web/images/tuong/hero/h2-text.png">
                        </span>
                        <div class="jn_img">
                              <img src="Web/images/tuong/hero/h2-img.png">
                        </div>
                    </div>
                    <div class="tac">
                        <span class="zy_txt">
                            <img src="Web/images/tuong/hero/h3-text.png">
                        </span>
                        <div class="jn_img">
                              <img src="Web/images/tuong/hero/h3-img.png">
                        </div>
                    </div>
                    <div class="tac">
                       <span class="zy_txt">
                            <img src="Web/images/tuong/hero/h4-text.png">
                        </span>
                        <div class="jn_img">
                              <img src="Web/images/tuong/hero/h4-img.png">
                        </div>
                    </div>
                    <div class="tac">
                        <span class="zy_txt">
                             <img src="Web/images/tuong/hero/h5-text.png">
                        </span>
                        <div class="jn_img">
                               <img src="Web/images/tuong/hero/h5-img.png">
                        </div>
                    </div>
            
                </div>
                <div class="zyCount">
                    <div><span class="zb_l"></span>
                    <ul>
                        <li class="cur"><img src="Web/images/tuong/hero/h1.png"></li>
                        <li><img src="Web/images/tuong/hero/h2.png"></li>
                        <li><img src="Web/images/tuong/hero/h3.png"></li>
                        <li><img src="Web/images/tuong/hero/h4.png"></li>
                        <li><img src="Web/images/tuong/hero/h5.png"></li>
                    </ul>
                    <span class="zb_r"></span></div>
                </div>
            </div>
        </div>
        <div class="zyTac" style="display:none">
            <div id="box1" class="zq zyList">
                <div class="Focus_list">
                    <!--flash3-->

                    <!--flash-->
                    <div class="tac cur">
                        <span class="zy_txt">
                            <img src="Web/images/tuong/dargon/text1.png">
                        </span>
                        <div class="jn_img">
                             <img src="Web/images/tuong/dargon/r1.png">
                        </div>
                    </div>
                    <div class="tac">
                        <span class="zy_txt">
                             <img src="Web/images/tuong/dargon/text2.png">
                        </span>
                        <div class="jn_img">
                             <img src="Web/images/tuong/dargon/r2.png">
                        </div>
                    </div>
                    
                    <div class="tac">
                        <span class="zy_txt">
                             <img src="Web/images/tuong/dargon/text3.png">
                        </span>
                        <div class="jn_img">
                             <img src="Web/images/tuong/dargon/r3.png">
                        </div>
                    </div>
                </div>
                <div class="zyCount">
                    <div><span class="zb_l"></span>
                    <ul>
                        <li  class="cur"><img src="Web/images/tuong/skill/r1.png"></li>
                        <li><img src="Web/images/tuong/skill/r2.png"></li>
                        <li><img src="Web/images/tuong/skill/r3.png"></li>
                       

                    </ul>
                    <span class="zb_r"></span></div>
                </div>
            </div>
        </div>
        <div class="zyTac" style="display:none">
            <div id="box2" class="jl zyList">
                <div class="Focus_list">
                    <div class="tac cur">
                        <span class="zy_txt">
                           <img src="Web/images/tuong/Mount/m1-text.png">
                        </span>
                        <div class="jn_img">
                             <img src="Web/images/tuong/Mount/m1-img.png">
                        </div>
                    </div>
                    <div class="tac">
                        <span class="zy_txt">
                              <img src="Web/images/tuong/Mount/m2-text.png">
                        </span>
                        <div class="jn_img">
                              <img src="Web/images/tuong/Mount/m2-img.png">
                        </div>
                    </div>
                    <div class="tac">
                        <span class="zy_txt">
                              <img src="Web/images/tuong/Mount/m3-text.png">
                        </span>
                        <div class="jn_img">
                             <img src="Web/images/tuong/Mount/m3-img.png">
                        </div>
                    </div>
                    <div class="tac">
                        <span class="zy_txt">
                             <img src="Web/images/tuong/Mount/m4-text.png">
                        </span>
                        <div class="jn_img">
                             <img src="Web/images/tuong/Mount/m4-img.png">
                        </div>
                    </div>
                    <div class="tac">
                        <span class="zy_txt">
                              <img src="Web/images/tuong/Mount/m5-text.png">
                        </span>
                        <div class="jn_img">
                             <img src="Web/images/tuong/Mount/m5-img.png">
                        </div>
                    </div>
                </div>
                <div class="zyCount">
                    <div><span class="zb_l"></span>
                    <ul>
                        <li  class="cur"><img src="Web/images/tuong/Mount/m1.png"></li>
                        <li>
                            <img src="Web/images/tuong/Mount/m2.png">
                        </li>
                        <li>
                           <img src="Web/images/tuong/Mount/m3.png">
                        </li>
                        <li>
                           <img src="Web/images/tuong/Mount/m4.png">
                        </li>
                        <li>
                           <img src="Web/images/tuong/Mount/m5.png">
                        </li>
                    </ul>
                    <span class="zb_r"></span></div>
                </div>
            </div>
        </div>
        <div class="zyTac" style="display:none">
            <div id="box3" class="jn zyList">
                <div class="Focus_list">
                    <div class="tac cur">
                        <span class="zy_txt">
                            <img src="Web/images/tuong/skill/skill1-text.png">
                        </span>
                        <div class="jn_img">
                             <img src="Web/images/tuong/skill/skill1-img.png">
                        </div>
                    </div>
                    <div class="tac">
                        <span class="zy_txt">
                             <img src="Web/images/tuong/skill/skill2-text.png">
                        </span>
                        <div class="jn_img">
                             <img src="Web/images/tuong/skill/skill2-img.png">
                        </div>
                    </div>
                    <div class="tac">
                        <span class="zy_txt">
                            <img src="Web/images/tuong/skill/skill3-text.png">
                        </span>
                        <div class="jn_img">
                           <img src="Web/images/tuong/skill/skill3-img.png">
                        </div>
                    </div>
                    <div class="tac">
                        <span class="zy_txt">
                            <img src="Web/images/tuong/skill/skill4-text.png">
                        </span>
                        <div class="jn_img">
                             <img src="Web/images/tuong/skill/skill4-img.png">
                        </div>
                    </div>
                </div>
                <div class="zyCount">
                    <div>
                        <span class="zb_l"></span>
                        <ul>
                            <li class="cur"> <img src="Web/images/tuong/skill/skill1.png"></li>
                            <li><img src="Web/images/tuong/skill/skill2.png"></li>
                            <li><img src="Web/images/tuong/skill/skill3.png"></li>
                            <li><img src="Web/images/tuong/skill/skill4.png"></li>
                        </ul>
                        <span class="zb_r"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection