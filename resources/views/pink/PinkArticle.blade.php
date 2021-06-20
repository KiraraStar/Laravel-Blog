@extends('blade.pinkLayout')
@section('title')
    Miiro's Space | {{$artInfo->artTitle}}
@endsection
@section('link')
    <link href="{{asset('/css/article.css')}}" rel="stylesheet">
    <link href="{{asset('/css/pinkArticle.css')}}" rel="stylesheet">
    <script src="{{asset('js/jquery.min.js')}}"></script>
    {{--    <script src="{{asset('plugs/mditor/mditor.js')}}"></script>--}}
    <script src="{{asset('js/basic.js')}}"></script>

    <link href="{{asset('css/hybrid.min.css')}}" rel="stylesheet">
    <script src="{{asset('js/highlight.min.js')}}"></script>
    <script>hljs.initHighlightingOnLoad();</script>
@endsection
@section('body')
    <div class="shiro-content-card">
        <div class="shiro-article">
            <div class="body-container">
                <div class="body-main" id="bodyMain">
                    <div class="body-art">
                        <article>
                            <h1 id="articleId">{{$artInfo->artTitle}}</h1>
                            <div class="art-info">
                                <div>
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor"
                                     class="bi bi-person-square" viewBox="0 0 16 16">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                    <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1v-1c0-1-1-4-6-4s-6 3-6 4v1a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12z"/>
                                </svg>
                                <div>{{$artInfo->author}}</div>
                            </span>
                                </div>
                                <div>
                             <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor"
                                     class="bi bi-calendar2-check" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                          d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2z"/>
                                    <path d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V4z"/>
                                    <path fill-rule="evenodd"
                                          d="M10.854 8.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                                </svg>
                                <div>{{$artInfo->artTime}}</div>
                            </span>
                                </div>
                                <div>
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor"
                                     class="bi bi-people" viewBox="0 0 16 16">
                                  <path fill-rule="evenodd"
                                        d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1h7.956a.274.274 0 0 0 .014-.002l.008-.002c-.002-.264-.167-1.03-.76-1.72C13.688 10.629 12.718 10 11 10c-1.717 0-2.687.63-3.24 1.276-.593.69-.759 1.457-.76 1.72a1.05 1.05 0 0 0 .022.004zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10c-1.668.02-2.615.64-3.16 1.276C1.163 11.97 1 12.739 1 13h3c0-1.045.323-2.086.92-3zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"/>
                                </svg>
                                <div>{{$artInfo->visitors}}</div>
                            </span>
                                </div>
                            </div>
                            <div class="art-list">
                                <span style="margin-left: 8px">CATALOG</span>
                                <ul class="catalog-ul" id="catalogMain">

                                </ul>
                            </div>
                            <div class="line"></div>
                            <div class="art-content">
                                {!! $artInfo->artHtml !!}
                            </div>
                            <div class="state">
                                <div class="line mar"></div>
                                <div class="post-licenses">
                                    <a href="https://creativecommons.org/licenses/by-nc-sa/4.0/" target="_blank"
                                       rel="nofollow">
                                        <div><span>知识共享署名-非商业性使用-相同方式共享 4.0 国际许可协议</span></div>
                                    </a>
                                </div>
                                <div class="post-tags">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                                     class="bi bi-tags" viewBox="0 0 16 16">
                                  <path d="M3 2v4.586l7 7L14.586 9l-7-7H3zM2 2a1 1 0 0 1 1-1h4.586a1 1 0 0 1 .707.293l7 7a1 1 0 0 1 0 1.414l-4.586 4.586a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 2 6.586V2z"/>
                                  <path d="M5.5 5a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1zm0 1a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3zM1 7.086a1 1 0 0 0 .293.707L8.75 15.25l-.043.043a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 0 7.586V3a1 1 0 0 1 1-1v5.086z"/>
                                </svg>
                            </span>
                                    <a href="#">Tags</a>
                                </div>
                                <div class="line mar"></div>
                            </div>
                            <div class="comments-block">
                                <div style="cursor: default;display: block;font-size: 1.17em;margin-block-start: 1em;margin-block-end: 1em;margin-inline-start: 0px;margin-inline-end: 0px;font-weight: bold;">
                                    Comments
                                </div>
                                @foreach($cms as $cm)
                                    <div class="signal-comment">
                                        <div class="comment-profile">
                                            <span>{{$cm->name}}</span>
                                            <span>发布于</span>
                                            <span>{{$cm->time}}</span>
                                        </div>
                                        {!! $cm->text !!}
                                    </div>
                                @endforeach
                                <div class="comment-editor">
                                    <div class="left-editor">
                                        <hm>Post Comment</hm>
                                        <input type="text" name="姓名" placeholder="昵称" id="name"><span
                                                style="color: red">*</span>
                                        <br>
                                        <input type="text" name="email" placeholder="电子邮箱" id="email"><span
                                                style="color: red">*</span>
                                    </div>
                                    <div class="right-editor">
                                        <textarea placeholder="在此输入~支持Markdown!" id="textVal"></textarea>
                                    </div>
                                    <div id="error"></div>
                                    <button id="postComment">Submit!</button>
                                </div>
                            </div>
                            <div class="arrows">
                                <div class="previous" id="previous">
                                    <div>
                                        <p>PREVIOUS</p>
                                        <p>上一页</p>
                                    </div>
                                </div>
                                <div class="next" id="next">
                                    <div>
                                        <p>NEXT</p>
                                        <p>下一页</p>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
@section('script')
    <script>
        //跳转
        $(function () {
            $('.bg-decoration').addClass('bg-img');
            $('.nav').css({
                position: 'relative',
            })
            //跳转页面
            @if($aID == null)
            $('#next').css('display', 'none');
            @else
            $('#next').click(function () {
                window.location.href = '/art/{{$aID}}';
            })
            @endif
            @if($bID == null)
            $('#previous').css('display', 'none');
            @else
            $('#previous').click(function () {
                window.location.href = '/art/{{$bID}}';
            })
            @endif

        });
        //延时加载editor
        //改变颜色
        $(function () {
            let loadEditor = document.createElement('script')
            loadEditor.src = '{{asset('plugs/mditor/mditor.js')}}'
            document.body.append(loadEditor)
            loadEditor.onload = function () {
                console.info('%c***CommentEditor加载完成***','color:green')
                //获取textarea dom对象
                var ele_textarea = document.getElementById('textVal');
                //实例化Mditor
                var editor = new mditor(ele_textarea);
                let pC = document.querySelector('#postComment');
                pC.addEventListener('click', function () {
                    console.log('前端验证');
                    let nameVal = document.querySelector('#name').value;
                    if (nameVal === '') {
                        document.querySelector('#error').innerHTML = '昵称不能为空!';
                        return 0;
                    }
                    let reg = /^([a-zA-Z]|[0-9])(\w|\-)+@[a-zA-Z0-9]+\.([a-zA-Z]{2,4})$/;
                    let emailVal = document.querySelector('#email').value;
                    if (!reg.test(emailVal)) {
                        document.querySelector('#error').innerHTML = '邮箱格式错误!';
                        return 0;
                    }
                    let textVal = document.querySelector('#textVal').value;
                    if (textVal === '') {
                        document.querySelector('#error').innerHTML = '填写comment!';
                        return 0;
                    }
                    let formData = new FormData();
                    formData.append('artId',{{$artInfo->artId}});
                    formData.append('name', nameVal);
                    formData.append('email', emailVal);
                    formData.append('text', editor.getHtml());
                    $.ajaxSetup({
                        headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'}
                    });
                    $.ajax({
                        type: "POST",
                        url: "{{ url('/art',$artInfo->artId) }}",
                        processData: false,
                        contentType: false,
                        data: formData,
                        success: function (data) {
                            console.log(data);
                            location.reload();
                        },
                        error: function (request, status, error) {
                            alert(error);
                        },
                    })
                })

                document.body.querySelector('textarea').style.backgroundColor = 'whitesmoke'
            }
        })
    </script>
@endsection