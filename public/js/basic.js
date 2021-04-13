//jquery 动画
$(function (){
    //导航栏的动画
    $('.nav-ul-control').click(function (){
        let line1 = $('.nav-ul-control-line:nth-child(1)');
        let line2 = $('.nav-ul-control-line:nth-child(2)');
        let line3 = $('.nav-ul-control-line:nth-child(3)');
        if(line1.hasClass('rotate-1-origin')){
            line2.css({
                opacity: 0,
            });
            $('.nav-ul').removeClass('position-origin').addClass('position-change');
            line1.removeClass('rotate-1-origin').addClass('rotate-1-change');
            line3.removeClass('rotate-3-origin').addClass('rotate-3-change');
        }else {
            line2.css({
                opacity: 1,
            });
            $('.nav-ul').removeClass('position-change').addClass('position-origin');
            line1.removeClass('rotate-1-change').addClass('rotate-1-origin');
            line3.removeClass('rotate-3-change').addClass('rotate-3-origin');
        }
    });
    //box=mini的动画
    $('.like-box-mini').hover(function (){
        $(this).children().children('.like-box-shadow').stop(true,true).animate({opacity: .8});
    },function (){
        $(this).children().children('.like-box-shadow').stop(true,true).animate({opacity: 0});
    });
})
