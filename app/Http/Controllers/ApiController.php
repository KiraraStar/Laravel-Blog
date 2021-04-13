<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ApiController extends Controller
{
    //
    public function getApi(Request $request, $content){
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Credentials: true");
        header("Access-Control-Allow-Methods: *");
        header("Access-Control-Allow-Headers: Content-Type,Access-Token");
        header("Access-Control-Expose-Headers: *");
        if(strstr($content,'code')){
            $returnInfo = DB::table('code')->orderBy('Id','desc')->get()->all();
            return response()
                ->json($returnInfo);
        }
        $error = ['error'];
        return response()
            ->json($error);
    }

    public function postImage(Request $request){
        Log::info($request->input());
        if ($request->hasFile('imageFile')) {
            $file = $request->file('imageFile');
            $name = $file->getClientOriginalName(); // 原始名称
            $realPath = $file->getRealPath(); //真实路径
            $extension = $file->getClientOriginalExtension(); //后缀
            $exContent = ['jpg', 'png']; //允许的后缀格式
            if (!in_array($extension, $exContent)) {
                return response()
                    ->json(['error,content']);
            }
            $newName = md5(date("Y-m-d H:i:s") . $name) . "." . $extension;
            //文件压缩
            $jpg = (string)Image::make($file)->encode('jpg', 20); //压缩中
            $fileInfo = array($name, $realPath, $extension, $newName, $jpg);
            Storage::disk('imgLoad')->put($newName, $jpg); //存储在 public/upload/img下
            DB::insert('insert into img_Storage(imgUrl,imgName) values (?,?)', [$newName, $request['img-name']]);
            $response = ['stateCode'=>'ok','name'=>$newName];
        } else {
            $response = ['error'];
        }
        return response()
            ->json($response);
    }
}
