@extends('blade.layout')
@section('title','Links | 链接')
@section('style')
    <style>
        line{
            display: block;
            margin: 4px 0;
            width: 100%;
            height: 1px;
            background-image: linear-gradient(to right, darkgrey 0%, darkgrey 50%, transparent 50%);
            background-size: 8px 1px;
            background-repeat: repeat-x;
            opacity: .5;
        }
        h5{
            vertical-align: center;
            padding: 4px;
            margin: 0;
            font-size: 16px;
        }
        .h5-intro{
            color: #464646;
            padding: 4px;
            margin: 0;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            font-weight: bolder;
        }
        .links-container{
            margin: 40px auto;
            width: 880px;
            background-color: transparent;
            height: auto;
            min-height: 200px;
        }
        .link-first-tap{
            display: flex;
            flex-wrap: wrap;
        }
        .link-first-tap>div{
            box-sizing: border-box;
            padding: 4px 8px;
            border: 2px lightgrey solid;
            width: 32.3%;
            margin: 8px 0.5%;
            background-color: white;
            border-radius: 8px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            cursor: pointer;
        }
        .link-first-tap>span{
            display: block;
            width: 100%;
            height: 20px;
            font-size: 18px;
            line-height: 20px;
            vertical-align: center;
            cursor: default;
            margin: 16px auto;
        }
        .link-first-tap>span>span{
            display: inline-block;
            width: 2px;
            background-color: #66BAB7;
            height: 100%;
            margin-right: 8px;
        }
        .link-first-tap>span>i{
            display: inline-block;
            height: 20px;
            vertical-align: top;
            font-style: normal;
            line-height: 23px;
        }
    </style>
@endsection
@section('body')
    <div class="links-container">
        <div class="link-first-tap">
            <span>
                <span></span>
                <i>关于我</i>
            </span>
            <br>
            <div class="link-box" id="github">
                <h5 style="color: #66BAB7">Github</h5>
                <line></line>
                <div class="h5-intro">Github的网址</div>
            </div>
        </div>
        <div class="link-first-tap">
            <span>
                <span></span>
                <i>大佬</i>
            </span>
            <br>
            <div class="link-box" id="soptq">
                <h5 style="color: #66BAB7">Soptq</h5>
                <line></line>
                <div class="h5-intro">dalao</div>
            </div>
        </div>
        <div class="link-first-tap">
            <span>
                <span></span>
                <i>工具网站</i>
            </span>
            <br>
            <div class="link-box" id="nip">
                <h5 style="color: #66BAB7">NipColor</h5>
                <line></line>
                <div class="h5-intro"><span style="color: #66BAB7">#66BAB7</span>的由来</div>
            </div>
            <div class="link-box" id="pixiv">
                <h5 style="color: #66BAB7">Pixivel</h5>
                <line></line>
                <div class="h5-intro">Pixiv的一个国内代理</div>
            </div>
            <div class="link-box" id="2dfan">
                <h5 style="color: #66BAB7">2DFan</h5>
                <line></line>
                <div class="h5-intro">发现新作</div>
            </div>

        </div>
    </div>
@endsection
@section('script')
    <script>
        $('.link-box').hover(function (){
            $(this).css({
                borderColor : '#66BAB7',
                boxShadow: '2px 2px 3px lightblue',
                transition : 'all .2s linear'
            })
            $(this).find('h5').css({
                marginLeft: '80px',
                transition : 'all .2s linear'
            })
            $(this).find('line').css({
                opacity: '0',
                transition : 'all .1s linear'
            })
        },function (){
            $(this).css({
                borderColor : 'lightgrey',
                boxShadow: 'none',
                transition : 'all .2s linear'
            })
            $(this).find('h5').css({
                marginLeft: '0',
                transition : 'all .1s linear'
            })
            $(this).find('line').css({
                opacity: '1',
                transition : 'all .2s linear'
            })
        })
        $('#github').click(function (){
            window.open('https://github.com/KiraraStar')
        })
        $('#soptq').click(()=>{
            window.open('https://soptq.me/')
        })
        $('#2dfan').click(()=>{
            window.open('https://galge.fun/')
        })
        $('#nip').click(()=>{
            window.open('https://nipponcolors.com/')
        })
        $('#pixiv').click(()=>{
            window.open('https://pixivel.moe/')
        })
    </script>
@endsection

