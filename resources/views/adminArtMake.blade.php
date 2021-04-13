<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>新的文章</title>
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

<form method="post" id="form-post">
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
    <div class="article-ue-content">
        <!-- 加载编辑器的容器 -->
        <script id="container" name="content" type="text/plain"></script>
        <!-- 配置文件 -->
        <script type="text/javascript" src="{{asset('plugs/ueditor/ueditor.config.js')}}"></script>
        <!-- 编辑器源码文件 -->
        <script type="text/javascript" src="{{asset('plugs/ueditor/ueditor.all.js')}}"></script>
        <!-- 实例化编辑器 -->
        <script type="text/javascript">
            var ue = UE.getEditor('container',{
                // initialFrameWidth :auto,//设置编辑器宽度
                initialFrameHeight:500,//设置编辑器高度
                autoHeightEnabled:false,
            });
        </script>
    </div>
    <input type="hidden" name="artHtml" id="artHtml">
    <input type="hidden" name="artContent" id="artConent">
</form>
<button id="submitBtn" type="submit">提交文章</button>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(function () {
        $('#submitBtn').click(function () {
            $('#artHtml').val(ue.getContent());
            $('#artConent').val(ue.getContentTxt());
            $('#form-post').submit();
        })
    })
    ue.ready(function () {
        // this.setHeight(1500);
        // this.setContent($('#htmlContainer').html())
    })
</script>
</html>
