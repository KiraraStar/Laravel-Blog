<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>上传</title>
</head>
<body>
<form method="post" enctype="multipart/form-data">
    @csrf
    <input type="text" name="img-name" placeholder="输入图片名">
    <br>
    <input type="file" name="img-content">
    <br>
    <input type="submit" value="提交">
    @if(session('msg'))
        <p>上传{{session('msg')}}</p>
    @endif
</form>
</body>
</html>
