<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<table border="1">
    <thead>
    <tr>
        <th>Id</th>
        <th>标题</th>
        <th>类型</th>
        <th>浏览量</th>
        <th>时间</th>
        <th>查看原文</th>
        <th>修改文章</th>
    </tr>
    </thead>
    <tbody>
    @foreach($artInfo as $aI)
        <tr>
            <td>{{$aI->artId}}</td>
            <td>{{$aI->artTitle}}</td>
            <td>{{$aI->artResource}}</td>
            <td>{{$aI->visitors}}</td>
            <td>{{$aI->artTime}}</td>
            <td><a href="{{asset(url('/art',$aI->artId))}}">查看</a></td>
            <td><a href="{{asset(url('/ad/artchange',$aI->artId))}}">修改</a></td>
            <td><a href="{{asset(url('/ad/artchange/md',$aI->artId))}}">以MD格式修改</a></td>
        </tr>
    @endforeach
    </tbody>
</table>
<p>
    @if(session('status'))
        {{session('status')}}
    @endif
</p>
</body>
</html>
