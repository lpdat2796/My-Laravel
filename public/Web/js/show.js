function myShow(e) {
    function c(e) {
        index = e;
        var t = 0;
        for (u = 0; u < f.length; u++) f[u].className = "";
        f[index].className = "current", clearInterval(o);
        for (u = 0; u < s.length; u++) s[u].style.opacity = 0, s[u].style.filter = "alpha(opacity=0)", s[u].style.display = "none";
        o = setInterval(function() {
            t += 15, t > 100 && (t = 100), s[index].style.opacity = t / 100, s[index].style.filter = "alpha(opacity = " + t + ")", s[index].style.display = "block"
        }, 70);
        if (!window.XMLHttpRequest) {
            for (u = 0; u < s.length; u++) s[u].style.display = "none";
            s[index].style.display = "block"
        }
    }

    function h() {
        play = setInterval(function() {
            index++, index >= s.length && (index = 0), c(index)
        }, 3500)
    }
    var t = document.getElementById(e),
        n = t.getElementsByTagName("span")[0],
        r = t.getElementsByTagName("span")[1],
        i = t.getElementsByTagName("ul")[0],
        s = i.getElementsByTagName("li"),
        o = play = null,
        u = index = 0,
        a = [],
        f = null;
    for (u = 0; u < s.length; u++) a.push("<li>" + (u + 1) + "</li>");
    var l = document.createElement("ul");
    l.className = "count", l.innerHTML = a.join(""), t.appendChild(l), f = t.getElementsByTagName("ul")[1].getElementsByTagName("li"), c(index);
    for (u = 0; u < f.length; u++) f[u].index = u, f[u].onmouseover = function() {
        c(this.index)
    };
    h(), t.onmouseover = function() {
        clearInterval(play)
    }, t.onmouseout = function() {
        h()
    };
    if (n, r) n.onclick = function() {
        index--, index < 0 && (index = s.length - 1), c(index)
    }, r.onclick = function() {
        index++, index >= s.length && (index = 0), c(index)
    }
}

// function selectList() {
//     var e = document.getElementById("search"),
//         t = e.getElementsByTagName("span")[0],
//         n = e.getElementsByTagName("ul")[0],
//         r = n.getElementsByTagName("li"),
//         i = 0;
//     e.onclick = function(e) {
//         var t = n.style;
//         t.display = t.display == "block" ? "none" : "block", (e || window.event).cancelBubble = !0
//     };
//     for (i = 0; i < r.length; i++) r[i].onmouseover = function() {
//         this.className = "hover"
//     }, r[i].onmouseout = function() {
//         this.className = ""
//     };
//     document.onclick = function() {
//         n.style.display = "none"
//     }
// }
// $(function() {
//         $.fn.hc_proTabChange = function(e) {
//             var e = e || "click",
//                 t = $(this);
//             t.find(".tab_h li").each(function(n) {
//                 $(this)[e](function() {
//                     $(this).addClass("current").siblings("li").removeClass("current"), t.find(".tab_c").eq(n).show().siblings(".tab_c").hide()
//                 })
//             })
//         }
//     }),
//     function() {
//         $backToTopEle = $('<div class="back_top"></div>').appendTo($("body")).click(function() {
//             $("html, body").animate({
//                 scrollTop: 0
//             }, 200)
//         }), $backToTopFun = function() {
//             var e = $(document).scrollTop(),
//                 t = $(window).height();
//             e > 0 ? $backToTopEle.show() : $backToTopEle.hide()
//         }, $(window).bind("scroll", $backToTopFun), $(function() {
//             $backToTopFun()
//         })
//     }(), $(function() {
//         $(".data li").hover(function() {
//             $(this).addClass("cur").siblings().removeClass("cur"), $(this).stop().animate({
//                 width: 389
//             }, 300).siblings().stop().animate({
//                 width: 130
//             }, 300)
//         })
//     });