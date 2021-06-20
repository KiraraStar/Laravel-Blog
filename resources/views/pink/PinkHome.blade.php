@extends('blade.pinkLayout')
@section('title')
    Miiro's Space | Simple and Updated
@endsection
@section('body')
    <div class="margin-change shiro-home">
        <div class="shiro-content-card">
            <div class="content-discovery">
                <h2>Top</h2>
            </div>
            @foreach($artTop as $at)
                <article>
                    <div class="article-content">
                        <h1 class="top-article">{{$at->artTitle}}</h1>
                        <div class="date top-article">
                            <div>{{$at->artTime}}</div>
                        </div>
                        <div class="main-part">
                            <a href="{{url('/art/'.$at->artId)}}" class="top-article">
                                {{$at->artContent}}
                            </a>
                        </div>
                        <div class="info top-article">
                            <a href="#">Admin</a>
                            <span>/</span>
                            <a href="#">{{$at->artResource}}</a>
                            <span>/</span>
                            <a href="#">技术</a>
                            <span>/</span>
                            <a href="#">0阅读</a>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
        <div class="shiro-content-card article-card">
            <div class="content-discovery">
                <h2>Article</h2>
            </div>
            @foreach($artInfo as $ai)
                @if($ai->show == 'yes')
                    <article>
                        <div class="article-content">
                            <h1>{{$ai->artTitle}}</h1>
                            <div class="date">
                                <div>{{$ai->artTime}}</div>
                            </div>
                            <div class="main-part">
                                <a href="{{url('/art/'.$ai->artId)}}">
                                    {{$ai->artContent}}
                                </a>
                            </div>
                            <div class="info">
                                <a href="#">Admin</a>
                                <span>/</span>
                                <a href="#">{{$ai->artResource}}</a>
                                <span>/</span>
                                <a href="#">技术</a>
                                <span>/</span>
                                <a href="#">0阅读</a>
                            </div>
                        </div>
                    </article>
                @endif
            @endforeach
            {{$artInfo->links()}}
        </div>
    </div>
@endsection
@section('script')
    <script>
        window.onload = ()=>{
            //去除头部margin
            let ShiroCard = document.body.querySelectorAll('.shiro-content-card');
            for(let item of ShiroCard){
                item.querySelector('article').style.marginTop  = '0px'
            }
        }
    </script>
@endsection