$(function (){
    //滚动条长度为6
    //调整窗口大小
    let iniw = window.innerWidth;
    $('.first-page').css({
        'width': iniw + 'px',
    });
    $(window).resize(function () {
        let iw = window.innerWidth;
        $('.first-page').css({
            'width': iw + 'px',
        })
    });
    //刷新动画
    if(window.innerWidth >= 900){
        $('.introduction img').addClass('intro-move');
        $('.introduction>div').addClass('intro-move-margin-0');
        setTimeout(function (){
            $('.introduction svg').addClass('intro-svg');
        },700);
    }else {
        $('.introduction>div').css({
            opacity: .7,
            marginLeft: 0,
        });
        $('.introduction svg').css({
            opacity: .7,
        });
    }
    //加载img
    $('.first-page').addClass('first-page-img');
    //超过722px改变背景颜色
    //visitor
    visitInfo();
    //点击下滑
    $('#continue').click(function () {
        //平滑滚动
        $('html,body').animate({
            scrollTop:$('.body-container').offset().top + 20,
        },500);
    });
    if(window.innerWidth <= 900){
        $('body').scroll = 'no';
    }
    //输出数量
    // console.log(window.location.href);
    //判断
    var children = $('#body-main').find('article');
    // console.log(children.length); //子元素数量
});

function visitInfo(){
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type :'post',
        url :'/',
        data :{
            ajaxId :'1',
            cityIp :returnCitySN['cip'],
            cityName :returnCitySN['cname'],
        },
        success :function (data) {
            // console.log(data);
        },
        error :function (xhr, type) {
            alert('ajaxError');
        }
    })
}
var n = 0;
var img = $('img');
var length = img.length;

//滚轮动画
// window.onscroll = function (){
//     //注意里面的90 是60 + 30的结果
//     changeNav();
//     showLike();
//     showDiscovery();
//     showArt();
// };
window.onscroll = throttle(function (){
    // console.log('1', $('.like-box').offset().top);
    // console.log('2', window.innerHeight + document.documentElement.scrollTop);
    //注意里面的90 是60 + 30的结果
    changeNav();
    showLike();
    showDiscovery();
    showArt();
    lazyLoad();
},30);
//防抖函数
function debounce(fn,delay){
    let timer = null //借助闭包
    return function() {
        if(timer){
            clearTimeout(timer)
        }
        timer = setTimeout(fn,delay) // 简化写法
    }
}
//节流throttle代码：
function throttle(fn,delay) {
    let canRun = true; // 通过闭包保存一个标记
    return function () {
        // 在函数开头判断标记是否为true，不为true则return
        if (!canRun) {
            return;
        }
        // 立即设置为false
        canRun = false;
        // 将外部传入的函数的执行放在setTimeout中
        setTimeout(() => {
            // 最后在setTimeout执行完毕后再把标记设置为true(关键)表示可以执行下一次循环了。
            // 当定时器没有执行的时候标记永远是false，在开头被return掉
            fn();
            canRun = true;
        }, delay);
    };
}
function lazyLoad(){
    // var seeHeight = document.documentElement.clientHeight; //可见区域高度
    // var scrollTop = document.documentElement.scrollTop || document.body.scrollTop; //滚动条距离顶部高度
    var allHeight = window.innerHeight + document.documentElement.scrollTop;
    for (var i = n;i < length;i++){
        // console.log($('img').eq(i).offset().top + '-' +  allHeight);
        if ($('img').eq(i).offset().top < allHeight) {
            if ($('img').eq(i).hasClass('origin')) {
                $('img').eq(i).removeClass('origin');
                img[i].src = img[i].getAttribute("data-src");
            }
            n = i + 1;
        }
    }
    // console.log('执行lazyload');
}
function showLike(){
    // console.log('showLike',$('.like-box').offset().top,'-',document.documentElement.clientHeight);
    // console.log($('.like-box').offset().top - $('.like-box').height());
    var allHeight = window.innerHeight + document.documentElement.scrollTop;
    if ($('.like-box').offset().top +  $('.like-box').height() < allHeight){
        if (!$('.like-box').hasClass('hasShow')){
            $('.line-block:nth-child(1)').dequeue().addClass('add-opacity-line');
            $('.like-box').dequeue().addClass('hasShow add-opacity-box');
        }
    }
}
function showDiscovery(){
    // let discoveryHeight = 90 + $('.unit1').innerHeight() + $('.line-block:nth-child(2)').innerHeight();
    var allHeight = window.innerHeight + document.documentElement.scrollTop;
    if ($('.line-block:nth-child(2)').offset().top + $('.line-block:nth-child(2)').height() < allHeight){
        if (!$('.line-block:nth-child(2)').hasClass('hasShow')){
            $('.line-block:nth-child(2)').dequeue().addClass('add-opacity-line');
        }
    }
}

function showDiscovery(){
    // let discoveryHeight = 90 + $('.unit1').innerHeight() + $('.line-block:nth-child(2)').innerHeight();
    var allHeight = window.innerHeight + document.documentElement.scrollTop;
    if ($('.line-block:nth-child(2)').offset().top + $('.line-block:nth-child(2)').height() < allHeight){
        if (!$('.line-block:nth-child(2)').hasClass('hasShow')){
            $('.line-block:nth-child(2)').dequeue().addClass('add-opacity-line');
        }
    }
}

function showArt(){
    for(let i =0;i<$('#body-main').find('article').length;i++){
        let number = i + 1;
        // var childAllHeight = 90 + $('.unit1').innerHeight() + $('.line-block:nth-child(2)').innerHeight() + $('article').innerHeight() * (number);
        //console.log(childAllHeight);
        var allHeight = window.innerHeight + document.documentElement.scrollTop;
        if ($('#body-main article').eq(i).offset().top + $('#body-main article').eq(i).height() < allHeight){
            if (!$('#body-main article').eq(i).hasClass('hasShow')){
                $('#body-main article').eq(i).dequeue().addClass('add-opacity-box');
            }
        }
    }
}

function changeNav(){
    if (document.body.scrollTop >= 722 || document.documentElement.scrollTop >= 722){
        $('.nav').removeClass('nav-bg-color-trans').addClass('nav-bg-color');
    }else{
        $('.nav').removeClass('nav-bg-color').addClass('nav-bg-color-trans');
    }
}
