<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>

    <link rel="icon" href="{{asset('image/i.ico')}}" type="image/gif">
    <link href="{{asset('/css/pinkMain.css')}}" rel="stylesheet">
    <link href="{{asset('/css/pagination.css')}}" rel="stylesheet">
    @yield('link')
</head>
<body>
<div class="shiro-container">
    <div id="particles" class="canvas"></div>
    <div class="shiro-header">
        <h2 class="header-title momo-mizusagi">Miiro's Space</h2>
        <div class="links">
            <div class="header-box link-active">
                <a href="#" class="a-active">主页</a>
            </div>
            <div class="header-box links-box">
                <a href="#">链接</a>
            </div>
            <div class="header-box links-box">
                <a href="#">归档</a>
            </div>
            <div class="header-box links-box">
                <a href="#">关于</a>
            </div>
        </div>
        <div class="header-next">
            <div class=" header-box header-search ">
                <div>
                    搜索
                </div>
            </div>
        </div>

    </div>

        <div class="shiro-content">
            <div class="canvas" ></div>
            @yield('body')
            <footer>
                <div>Powered by Miiro</div>
                <div>Frame last update 2021/06/20</div>
            </footer>
        </div>


</div>
</body>
<script>
    // let changeHeight  = function (){
    //     //调整canvas
    //     let canvas = document.body.querySelector('#particles')
    //     let shiroContentCard = document.querySelectorAll('.shiro-content-card')
    //     let height = 0
    //     for(let item of shiroContentCard){
    //         height += +item.clientHeight
    //     }
    //     canvas.style.height = height + 'px';
    //     // let star = document.createElement('script')
    //     // document.body.append(star)
    //     // star.onload = function (){
    //     //     console.log('%c***背景Star加载完成***','color:green')
    //     // }
    // }
    // changeHeight()
</script>
<script src="{{asset('/js/stars.js')}}"></script>
@yield('script')
</html>