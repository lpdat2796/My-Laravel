jQuery(document).ready(function() {

     /* Popup  */
    var divPop;
    var subPop;
    //  jQuery(document).on('click', '.icons-close,.close', function(event) {
    //     divPop = jQuery(this).attr('data-rel');
    //     showPopup(divPop);
    // })

    $('#link1').click(function(){
        var id=$('.ul-tab-new .active').attr('id');
        if(id==1)
        {
            $('#link1').attr("href","list-new.html/"+1);
        }
        else if(id==2)
        {
            $('#link1').attr("href","list-new.html/"+2);
        }
        else if(id==3)
        {
            $('#link1').attr("href","list-new.html/"+3);
        }
        
    });
  // scroll to top
    jQuery('.icons-top').click(function() {
        jQuery('html, body').animate({ scrollTop: 0 }, 300);

    });

     $(".various").fancybox({
        type: "iframe",
        padding: 0,
        fitToView: false,
        width: '100%',
        height: '100%',
        openEffect: 'true',
        closeEffect: 'true'
    });
     
    /* giftcode  */
  jQuery(".icons-giftcode").click(function(e){
   iscCore.Popup();
  });
  $('.owl-slide').owlCarousel({
        margin: 0,
        autoplay: true,
        autoplayTimeout: 3000,
        autoplayHoverPause: true,
        loop: true,
        items:1,
        nav:false,
        responsiveClass:false

    });

/* List server */
    var items = 5;
    var _pos = 0;
    var _step = 0;

    if (jQuery("ul#TabNum").length > 0) {
        jQuery("ul#TabNum").jcarousel({
            visible: items,
            scroll: 5,
            initCallback: init,
            itemLastOutCallback: {
                onAfterAnimation: itemLastOutCallback
            }

        });
    }

    function init(carousel, item) {
        jQuery("ul#TabNum > li").click(function() {
            _pos = jQuery(this).prevAll().length;
            showListServer(_pos);
            activeTabServer(_pos);
            return false;

        });
    };

    function itemLastOutCallback(carousel, item, index, state) {
        if (state == 'next') {
            _step += 6;
        } else {
            _step -= 6;
        }
        showListServer(_step);
        activeTabServer(_step);
    }

    function showListServer(_pos) {
        jQuery(this).parent().find("li").removeClass("Active");
        jQuery(this).addClass("Active");
        jQuery(".List_Name").removeClass("Active");
        jQuery(".List_Name").animate({
            opacity: 0
        }, 100);
        jQuery(".List_Name").eq(_pos).addClass("Active");
        jQuery(".List_Name").eq(_pos).animate({
            opacity: 1
        }, 100);
    }

    function activeTabServer(_pos) {
        /*alert(_pos);*/
        jQuery("#TabNum > li").removeClass("Active");
        jQuery("#TabNum > li").eq(_pos).addClass("Active");
    }

});



function zyshow1(e) {
    showTime(e);
}

function zyshow2(e) {
    showTime(e);
}

function zyshow3(e) {
    showTime(e);
}

function zyshow4(e) {
    showTime(e);
}

function showTime(e) {
    $(function() {
        function f() {
            $("#" + e + " .zyCount li").removeClass("cur"), $("#" + e + " .zyCount li").eq(o).addClass("cur"), $("#" + e + "  .Focus_list .tac").stop().animate({
                opacity: 0
            }, 300), $("#" + e + "  .Focus_list .tac").eq(o).stop().animate({
                opacity: 1
            }, 300), $("#" + e + "  .Focus_list .tac").removeClass("cur"), $("#" + e + "  .Focus_list .tac").eq(o).addClass("cur")
        }

        function l() {
            u = setInterval(function() {
                o++, o > i - 1 && (o = 0), f()
            }, 2500)
        }
        var t = [],
            n = $("#" + e),
            r = n.children(".Focus_list"),
            i = r.children(".tac").size(),
            s = n.children(".count"),
            o = 0,
            u = null;
        f(), $("#" + e + " .zyCount li").each(function(t) {
            $(this).hover(function() {
                o = t, f()
            })
        }), l(), $(".zyTag").hover(function() {
            clearInterval(u)
        }, function() {
            l()
        })
    })
}
$(function() {
    $(".zyTab li").click(function() {
        $(this).addClass("cur").siblings().removeClass("cur");
        var e = $(".zyTab li").index(this);
        $(".zyTag .zyTac").eq(e).show().siblings().hide()
    })
});

function showPopup(object){
    jQuery('body').append('<div class="bgover"></div>')
    jQuery("." + object).addClass('animate-in').removeClass('animate-out');
    jQuery(document).on('click', '.bgover,.icons-close', function(event) {
        event.preventDefault();
        jQuery(".bgover").remove();
        jQuery("." + object).removeClass('animate-in');
    });
}