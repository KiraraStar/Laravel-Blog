<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('plugs/editor-md/css/editormd.min.css')}}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/editor-md/1.5.0/editormd.min.js"></script>
</head>
<body>
<form method="post" id="formMd">
    @csrf
    <label>
        <input type="text" placeholder="输入一个标题" name="title" id="title">
    </label>
    <p>下面是编辑器</p>
    <div id="editor">
        <textarea style="display: none">Editor-Md！</textarea>
    </div>
</form>
<button id="submit">提交</button>
</body>
<script>
    $(function() {
        var editor = editormd("editor", {
            width: "100%",
            height: 500,
            saveHTMLToTextarea: true,
            // markdown: "xxxx",     // dynamic set Markdown text
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
