<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class AdminController extends Controller
{
    //登录验证
    public function login(Request $request){
        if($request->isMethod('post')){
            $originAdmin = DB::table('admin')->get()->first();
//            if ($request['name'] == decrypt($originAdmin->name) && $request['pw'] == decrypt($originAdmin->pw)){
            if ($request['name'] == 'admin' && $request['pw'] == '1404'){
//                $loginInfo = encrypt('nowlogin');
                $hashCheck = Hash::make('nowlogin');
//                dd($loginInfo);
//                $hashCheck = 'nowlogin';
                return redirect('/ad/main')->cookie('check',$hashCheck,43200);
            }else{
                return back();
            }
        }else{
            $cookie = $request->cookie('check');
            //存在cookie直接跳转
            if ($cookie != null && Hash::check('nowlogin',$_COOKIE['check'])){
                return redirect('/ad/main');
            }else{
                return response()
                    ->view('adminLogin');
            }
        }
    }

    public function main(Request $request){
        return response()
            ->view('adminMain');
    }
    public function menu(Request $request){
        return response()
            ->view('adminMenu');
    }
    public function artList(Request $request){
        $artInfo = DB::table('article')->get()->all();
        return response()
            ->view('adminArtList',['artInfo'=>$artInfo]);
    }
    public function codeMake(Request $request){
        if($request->isMethod('post')){
            $insertList = array($request['title'],$request['editor-markdown-doc'],$request['editor-html-code']);
            DB::insert('insert into code(Title,Markdown,Html) values (?,?,?)',$insertList);
            return redirect('/ad/artlist')->with(['status'=>'插入信息成功']);
        }
        return response()
            ->view('adminCodeMake');
    }
    public function artMake(Request $request){
        if ($request->isMethod('post')){
//            dd($request->input());
            $artOrigin = array($request['artTitle'],$request['artHtml'],$request['artContent'],$request['orir'],$request['artImg']);
            DB::insert('insert into article(artTitle,artHtml,artContent,artResource,artImg) values (?,?,?,?,?)',$artOrigin);
            return redirect('/ad/artlist')->with(['status'=>'ok']);
        }
        return response()
            ->view('adminArtMake');
    }
    public function artMakeMd(Request $request){
        if ($request->isMethod('post')){
            $artOrigin = array($request['artTitle'],$request['editor-html-code'],$request['editor-markdown-doc'],$request['orir'],$request['artImg']);
            DB::insert('insert into article(artTitle,artHtml,artContent,artResource,artImg) values (?,?,?,?,?)',$artOrigin);
            return redirect('/ad/artlist')->with(['status'=>'ok']);
        }
        return response()
            ->view('adminArtMakeMd');
    }
    public function artChange(Request $request, $id){
        if($request->isMethod('post')){
            DB::update('update article set artTitle=?,artHtml=?,artContent=? where artID=?',
                [$request['artTitle'],$request['artHtml'],$request['artContent'],$id]);
            return redirect('/ad/artlist');
        }
        $artCode = DB::table('article')->where('artID','=',$id)->get()->first();
        $artCode->artHtml = str_replace('"','\'',$artCode->artHtml);
        $artCode->artHtml = str_replace('"','\'',$artCode->artHtml);
        $artCode->artHtml = str_replace('\n','<br>',$artCode->artHtml);
        $artCode->rewriteCode = 1;
        return response()
            ->view('adminArtChange',['artCode'=>$artCode]);
    }
    public function artChangeMd(Request $request, $id){
        if($request->isMethod('post')){
            DB::update('update article set artTitle=?,artHtml=?,artContent=? where artID=?',
                [$request['artTitle'],$request['editor-html-code'],$request['editor-markdown-doc'],$id]);
            return redirect('/ad/artlist');
        }
        $artCode = DB::table('article')->where('artID','=',$id)->get()->first();
//        $artCode->artHtml = str_replace('"','\'',$artCode->artHtml);
//        $artCode->artHtml = str_replace('"','\'',$artCode->artHtml);
//        $artCode->artHtml = str_replace('\n','<br>',$artCode->artHtml);
        $artCode->rewriteCode = 1;
        return response()
            ->view('adminArtChangeMd',['artCode'=>$artCode]);
    }
    public function imgShow(Request $request){
        $size = 1;
        $imgAll = DB::table('img_Storage')->orderBy('Id','desc')->paginate(9)->onEachSide(1);//获得数据库全部图片
//        dd($imgAll);
        return response()
            ->view('adminImgShow',['imgAll'=>$imgAll]);
    }
    public function imgLoad(Request $request){
        if ($request->isMethod('post')) {
            if ($request->hasFile('img-content')) {
                $file = $request->file('img-content');
                $name = $file->getClientOriginalName(); // 原始名称
                $realPath = $file->getRealPath(); //真实路径
                $extension = $file->getClientOriginalExtension(); //后缀
                $exContent = ['jpg', 'png']; //允许的后缀格式
                if (!in_array($extension, $exContent)) {
                    return back()->with(['msg' => '非图片后缀']);
                }
                $newName = md5(date("Y-m-d H:i:s") . $name) . "." . $extension;
                //文件压缩
                $jpg = (string)Image::make($file)->encode('jpg', 20); //压缩中
                $fileInfo = array($name, $realPath, $extension, $newName, $jpg);
                Storage::disk('imgLoad')->put($newName, $jpg); //存储在 public/upload/img下
                DB::insert('insert into img_Storage(imgUrl,imgName) values (?,?)', [$newName, $request['img-name']]);
                return back()->with(['msg' => $newName]);
            } else {
                return back()->with(['msg' => '无图片文件']);
            }
        }
        return response()
            ->view('adminImgLoad');
    }
}
