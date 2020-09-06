$(document).ready(function(){

    $(window).scroll(function(){
        var containerH = $(".carousel").css("height");
        containerH = parseInt(containerH);
        if($(this).scrollTop() > containerH-100){
            $(".navbar").css("backgroundColor","rgb(132 0 0)")
        }else{
            $(".navbar").css("backgroundColor","rgb(132 0 0 / 70%)")
        }
    })

    $(".navbar-toggle").click(function(){
        $(".navbar").toggleClass("nav-head");
        $(".remove").removeClass("wow fadeInUp").css({
            "animation-name":"ww"
        });
    })

    $(".butt").click(function(){
        $(this).addClass("active");
        $(this).siblings().removeClass("active");
        $(".remove").removeClass("wow fadeInUp").css({
            "animation-name":"ww",
            "visibility":"visible"
        });
    })

    $(".img-container").on({
        mouseenter: function(){
            $(this).find(".img-hov").css({
                "transform":"rotateX(0deg) scale(1)",
                "opacity":"1"
            })
        },
        mouseleave: function(){
            $(this).find(".img-hov").css({
                "transform":"rotateX(180deg) scale(0.5)",
                "opacity":"0"
            })
        },
    })

    $(".big-box").click(function(){
        $(".box").css("animation","hide 1s forwards");
        $(".show-img").hide(1000)
    })

    $(".show-me").click(function(){
        var selectImg = $(this).parents(".remove").find("img");
        var srcImg = selectImg.attr("src");
        $('.box img').attr("src",srcImg);
        $(".show-img").css({
            "display":"flex",
        });
        $(".box").css("animation","show 1s forwards");
    })
    
});