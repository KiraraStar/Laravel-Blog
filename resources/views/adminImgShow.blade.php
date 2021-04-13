<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>图片库</title>
</head>
<style>
    .img-show-box{
        overflow: hidden;
    }
    img{
        width: 500px;
        height: auto;
    }
</style>
<body>
    <div class="img-show-box" id="imgShowBox">
        @foreach($imgAll as $ia)
            <div class="img-show-mini">
                <img src="{{asset('/upload/img/'.$ia->imgUrl)}}" alt="{{$ia->imgName}}">
                <p onclick="clickThis(this)">{{$ia->imgUrl}}</p>
            </div>
        @endforeach
        <textarea id="tinput"></textarea>
        {{$imgAll->links()}}
    </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    function clickThis(object) {
        $('#tinput').val(object.innerText);
        $('#tinput').select();
        document.execCommand("Copy");
        alert('复制成功');
    }
</script>
</html>
