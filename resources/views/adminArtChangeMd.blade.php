<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Md格式修改</title>

    <link rel="stylesheet" href="{{asset('plugs/editor-md/css/editormd.min.css')}}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/editor-md/1.5.0/editormd.min.js"></script>
</head>
<style>
    .article-ue-content{
        width: 60%;
        margin: 0 auto;
    }
    input[type=text]{
        text-align: center;
        transform: translate(-50%,0);
        margin-left: 50%;
    }
    p{
        text-align: center;
    }
    .radio{
        text-align: center;
    }
    .view img{
        width: 10%; !important;
        text-align: center;
    }
</style>
<body>
<div>
    这是新建文章的页面
    等待编辑器加载...
</div>

<form method="post" id="formMd">
    @csrf
    <div class="article-ue-title">
        <p>文章标题</p>
        <input class="f-input" type="text" id="title" name="artTitle" placeholder="输入标题">
        <p>文章来源</p>
        <div class="radio">
            <label for="ck1">原创</label><input type="radio" name="orir" value="原创" id="ck1">
            <label for="ck2">转载</label><input type="radio" name="orir" value="转载" id="ck2">
        </div>
        <p>图片名称</p>
        <input class="f-input" type="text" id="image" name="artImg" placeholder="图片url">
    </div>
    <div id="editor">
        <textarea style="display: none">
            @if($artCode != null && $artCode->rewriteCode == 1)
                {!! $artCode->artContent !!}
            @endif
        </textarea>
    </div>
    <input type="hidden" name="artHtml" id="artHtml">
    <input type="hidden" name="artContent" id="artConent">
</form>
<button id="submit" type="submit">提交文章</button>
<pre style="display: none" id="htmlContainer">

</pre>
</body>
<script src="https://cdn.bootcdn.net/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    // console.log($('#htmlContainer').html());
    $(function() {
        var editor = editormd("editor", {
            width: "100%",
            height: 650,
            saveHTMLToTextarea: true,
            // markdown: $('#htmlContainer').html(),     // dynamic set Markdown text
            path : "/plugs/editor-md/lib/"  // Autoload modules mode, codemirror, marked... dependents libs path
        });

        $('#submit').click(function (){
            submitMd();
        })

        function submitMd(){
            $('#formMd').submit();
        }
    });
</script>
</html>
