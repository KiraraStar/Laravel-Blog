<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Miiro's Blog | Simple and Updated</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=no">
    <meta name="msvalidate.01" content="61C6F08D1AFA421FD150C0B65F67296F" />
    <meta name="baidu-site-verification" content="code-ISuwirQ5IZ" />
    <meta name="description" content="My favorite and my Love">

    <link rel="icon" href="{{asset('image/i.ico')}}" type="image/gif">
    <link href="{{asset('css/basic.css')}}" rel="stylesheet">
    <link href="{{asset('css/home.css')}}" rel="stylesheet">
    <link href="{{asset('css/animate.css')}}" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/vue"></script>
    <script src="https://cdn.bootcdn.net/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{asset('js/basic.js')}}"></script>


</head>
<body>
<nav id="nav" class="nav">
    <div class="nav-bar">
        <div class="nav-brand" @click="dirHome">Miiro</div>
        <div class="nav-ul-control">
            <div class="nav-ul-control-line rotate-1-origin"></div>
            <div class="nav-ul-control-line"></div>
            <div class="nav-ul-control-line rotate-3-origin"></div>
        </div>
        <ul class="nav-ul">
            <nav-ul-items v-for="item in items" v-bind:item="item"></nav-ul-items>
        </ul>
    </div>
</nav>
<div class="first-page">
    <div class="introduction">
        <a href="#">
            <img src="{{asset('image/neko.jpg')}}" alt="">
        </a>
        <div>
            <p>"Loving Then Continue"</p>
            <svg id="continue" t="1613116970596" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="1477" width="40" height="40">
                <path d="M512 785.066667c-2.1504 0-4.317867-0.4096-6.365867-1.2288l-426.666666-171.52a17.066667 17.066667 0 0 1 12.731733-31.675734L512 749.602133l420.3008-168.942933a17.066667 17.066667 0 1 1 12.731733 31.675733l-426.666666 171.52c-2.048 0.802133-4.215467 1.211733-6.365867 1.211734z m0-171.52a16.896 16.896 0 0 1-6.314667-1.211734l-426.666666-169.813333A17.066667 17.066667 0 0 1 68.266667 426.666667V256a17.083733 17.083733 0 0 1 23.3984-15.854933L512 408.285867l420.334933-168.1408A17.083733 17.083733 0 0 1 955.733333 256v170.666667a17.066667 17.066667 0 0 1-10.752 15.854933l-426.666666 169.813333a16.896 16.896 0 0 1-6.314667 1.211734zM102.4 415.095467l409.6 163.0208 409.6-163.0208v-133.888l-403.2512 161.314133a17.134933 17.134933 0 0 1-12.680533 0L102.4 281.207467v133.888z" p-id="1478" fill="#ffffff"></path>
            </svg>
        </div>
    </div>
</div>
<div class="body-container">
    <div class="body-main" id="body-main">
        <div class="unit1">
            <unit-block v-bind:info="items[0]"></unit-block>
            <!--注目文章-->
            <div class="like-box" id="likeBox">
                @foreach($artTop as $at)
                    <div class="like-box-mini">
                        <a href="{{url('/art/'.$at->artId)}}">
                            <div class="like-box-shadow">
                                <div class="like-box-sum">
                                    {{$at->artContent}}
                                </div>
                            </div>
                            {{--                                <img src="{{asset('/upload/img/'.$at->artImg)}}" alt="">--}}
                            <img class="origin" src="{{asset('/image/loading.gif')}}" data-src="{{asset('/upload/img/'.$at->artImg)}}" onerror="this.src = '{{asset('/image/error.jpg')}}'" alt="">
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
        <unit-block v-bind:info="items[1]"></unit-block>
        @foreach($artInfo as $ai)
            <article class="article">
                <div class="art-left">
                    <img class="origin" src="{{asset('/image/loading.gif')}}" data-src="{{asset('/upload/img/'.$ai->artImg)}}" onerror="this.src = '{{asset('/image/error.jpg')}}'" alt="">
                </div>
                <div class="art-right">
                    <div class="show-date">
                        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="currentColor" class="bi bi-calendar2-check" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2z"/>
                            <path d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V4z"/>
                            <path fill-rule="evenodd" d="M10.854 8.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                        </svg>
                        <div>{{$ai->artTime}}</div>
                    </div>
                    <h2>{{$ai->artTitle}}</h2>
                    <div class="art-info">
                        <div class="art-info-visitors">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
                                  <path fill-rule="evenodd" d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1h7.956a.274.274 0 0 0 .014-.002l.008-.002c-.002-.264-.167-1.03-.76-1.72C13.688 10.629 12.718 10 11 10c-1.717 0-2.687.63-3.24 1.276-.593.69-.759 1.457-.76 1.72a1.05 1.05 0 0 0 .022.004zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10c-1.668.02-2.615.64-3.16 1.276C1.163 11.97 1 12.739 1 13h3c0-1.045.323-2.086.92-3zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"/>
                                </svg>
                                <div>{{$ai->visitors}}</div>
                            </span>
                        </div>
                        <div class="art-info-resource">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-arrow-down-square" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                    <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v5.793l2.146-2.147a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-3-3a.5.5 0 1 1 .708-.708L7.5 10.293V4.5A.5.5 0 0 1 8 4z"/>
                                </svg>
                                <i>{{$ai->artResource}}</i>
                            </span>
                        </div>
                    </div>
                    <div class="art-content">
                        <a href="{{url('/art/'.$ai->artId)}}" title="biaoti">
                            <div>
                                <div>{{$ai->artContent}}</div>
                            </div>
                        </a>
                    </div>
                </div>
            </article>
        @endforeach
    </div>
    {{$artInfo->links()}}
</div>
<footer>
    <div class="footer-container">
        <div>Powered by Miiro</div>
        <div>Just for fun</div>
    </div>
</footer>
</body>

<script src="{{asset('/js/homeVue.js')}}"></script>
<script src="http://pv.sohu.com/cityjson?ie=utf-8"></script>
<script src="{{asset('/js/home.js')}}"></script>

</html>
