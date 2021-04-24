<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <script src="https://cdn.bootcdn.net/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<style>
    body{
        padding: 0;
        margin: 0;
        border: 0;
        font-family: "Courier New", "新宋体", serif !important;
        background-color: white;
        overflow-x: hidden;
    }
    ul {
        list-style-type: none;
        padding: 0;
        margin: 0;
    }
</style>
<style>
    /*nav相关*/
    .nav{
        position: fixed;
        height: 50px;
        width: 100%;
        background-color: white;
        opacity: 1;
        z-index: 100;
        color: #464646;
        overflow: hidden;
        font-size: 18px;
        box-shadow: 0 3px 10px #464646;
    }
    .nav-bar{
        height: 100%;
        margin-left: 5%;
        margin-right: 5%;
    }
    .nav-brand{
        height: 100%;
        width: auto;
        float: left;
        line-height: 50px;
        padding: 0 25px 0 0;
        cursor: pointer;
        font-size: 25px;
    }
    .nav-ul-control {
        float: right;
        height: 50px;
        width: 50px;
        background-color: transparent;
        cursor: pointer;
        z-index: 1000;
    }
    .nav-ul-control-line:nth-child(1) {
        margin-top: 18px;
    }
    .nav-ul-control-line:nth-child(2) {
        margin-top: 4px;
    }
    .nav-ul-control-line:nth-child(3) {
        margin-top: 4px;
    }
    .rotate-1-origin {
        transform: rotate(0);
        transition: all .3s linear;
        transform-origin: left;
    }
    .rotate-1-change {
        transform: rotate(39deg);
        transition: all .3s linear;
        transform-origin: left;
    }
    .rotate-3-origin {
        transform: rotate(0);
        transition: all .3s linear;
        transform-origin: left;
    }
    .rotate-3-change {
        transform: rotate(-39deg);
        transition: all .3s linear;
        transform-origin: left;
    }
    .nav-ul-control-line {
        margin-left: 30%;
        width: 40%;
        background-color: #464646;
        height: 2px;
    }
    .nav-ul {
        height: 100%;
        width: auto;
        float: right;
    }
    .nav-ul li {
        display: inline-block;
        line-height: 50px;
        width: auto;
        height: 100%;
        padding: 0 12.5px;
        cursor: pointer;
    }
    .position-origin {
        margin-right: 0;
        transition: all .3s linear;
        opacity: 1;
    }
    .position-change {
        margin-right: -500px;
        transition: all .3s linear;
        opacity: 0;
    }
    .nav-ul li>a:link,.nav-ul li>a:visited,.nav-ul li>a:active{
        color: #464646;
        text-decoration: none;
    }
    .nav-ul li:hover{
        opacity: .8;
        background-color: #66BAB7;
        color: white;
        transition: all .3s linear;
    }
</style>
<style>
    /*背景*/
    .bg-img {
        /*background-image: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.2)), url(../image/new.jpg);*/
    }
    .bg-decoration {
        opacity: 1;
        background-position: center center;
        background-repeat: no-repeat;
        background-size: cover;
        height: 100%;
        position: fixed;
        top: 0;
        transition: opacity 700ms;
        width: 100%;
        filter: blur(2px);
        z-index: -100;
    }
    /*body相关*/
    .body-container{
        position: relative;
        padding-top: 50px;
        min-height: 700px;
        width: 100%;
        overflow: hidden;
        z-index: 0;
    }
</style>
<style>
    /*footer 相关*/
    .footer-container {
        padding: 30px 0;
        position: absolute;
        height: auto;
        width: 100%;
        opacity: .8;
        background-color: white;
        border-top: 1px solid rgba(46,46,46,0.4);
        /*box-shadow: 0px -3px 10px #464646;*/
    }
    .footer-container>div {
        text-align: center;
        color: #464646;
        cursor: default;
    }
</style>
@yield('style')
<body>
   <nav id="nav" class="nav">
       <div class="nav-bar">
           <div class="nav-brand">Miiro</div>
           <div class="nav-ul-control">
               <div class="nav-ul-control-line rotate-1-origin"></div>
               <div class="nav-ul-control-line"></div>
               <div class="nav-ul-control-line rotate-3-origin"></div>
           </div>
           <ul class="nav-ul">
               <li><a href="{{url('/')}}">Home</a></li>
               <li><a href="#">About</a></li>
               <li><a href="{{url('/links')}}">Links</a></li>
               <li><a href="#">Img</a></li>
               <li><a href="#">Search</a></li>
           </ul>
       </div>
   </nav>
   <div class="bg-decoration bg-img"></div>
   <div class="body-container">
        @yield('body')
   </div>
   <footer>
       <div class="footer-container">
           <div>Powered by Miiro</div>
           <div>Just for fun</div>
       </div>
   </footer>
</body>
<script>

    $('.nav-brand').click(()=>{
        window.location.href = '/';
    })
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
</script>
@yield('script')
</html>
