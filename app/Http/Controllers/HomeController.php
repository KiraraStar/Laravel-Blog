<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function Index(Request $request){
        if($request->ajax()){
            //ajax的ip信息
            /**
             * visit (Id,vIp,vName,vTime)
             */
            //对ip进行打包
            $info = DB::table('visit')->where('vIp','=',$request['cityIp'])->first();
            if($info != null){
                $arrayJson = json_decode($info->vArray,true);
                $arrayJson[sizeof($arrayJson) + 1] = date(date('y-m-d H:i:s'));
                $json = json_encode($arrayJson);
                DB::update('update visit set vArray=? where vIp=?',[$json,$request['cityIp']]);
            }else{
                $ipInfo = array('1'=>date(date('y-m-d H:i:s')));
                $ipInfo = json_encode($ipInfo);
                DB::insert('insert into visit(vIp,vName,vArray) values (?,?,?)',[$request['cityIp'],$request['cityName'],$ipInfo]);
            }
            return response()->json(['ajaxId'=>$request['ajaxId'],'status'=>'success']);
        }
        //倒序
        $artPag = DB::table('article')->where('show','=','yes')->orderBy('artID','desc')->simplePaginate(6);
        for($i=0;$i<count($artPag);$i++){
            //去掉html标签
            $artPag[$i]->artContent = strip_tags($artPag[$i]->artHtml);
            if(strlen($artPag[$i]->artContent)>150){
                $artPag[$i]->artContent = mb_substr($artPag[$i]->artContent,0,150).'...';
            }
            //日期格式化
            $artPag[$i]->artTime = date('Y-m-d',strtotime($artPag[$i]->artTime));
        }
        //top文章
        $indexRec = DB::table('article')->orderBy('artId','desc')->where('artTop','=','yes')->get();
        $indexRecSend = array();
        //文章数量大于3，否则为1
        count($indexRec) >= 3 ? $indexI = 3 : $indexI = 1;
        for($i=0;$i<$indexI;$i++){
            $indexRecSend[$i] = $indexRec[$i];
            if(strlen($indexRecSend[$i]->artContent)>150){
                $indexRecSend[$i]->artContent = mb_substr($indexRecSend[$i]->artContent,0,150).'...';
            }
        }
        //转到新的Pink
//        return response()
//            ->view('home',['artInfo' => $artPag,'artTop'=>$indexRecSend]);
        return response()
                ->view('pink.PinkHome',['artInfo' => $artPag,'artTop'=>$indexRecSend]);
    }

    public function Mirror(Request $request){
        if($request->ajax()){
            //ajax的ip信息
            /**
             * visit (Id,vIp,vName,vTime)
             */
            //对ip进行打包
            $info = DB::table('visit')->where('vIp','=',$request['cityIp'])->first();
            if($info != null){
                $arrayJson = json_decode($info->vArray,true);
                $arrayJson[sizeof($arrayJson) + 1] = date(date('y-m-d H:i:s'));
                $json = json_encode($arrayJson);
                DB::update('update visit set vArray=? where vIp=?',[$json,$request['cityIp']]);
            }else{
                $ipInfo = array('1'=>date(date('y-m-d H:i:s')));
                $ipInfo = json_encode($ipInfo);
                DB::insert('insert into visit(vIp,vName,vArray) values (?,?,?)',[$request['cityIp'],$request['cityName'],$ipInfo]);
            }
            return response()->json(['ajaxId'=>$request['ajaxId'],'status'=>'success']);
        }
        //倒序
        $artPag = DB::table('article')->orderBy('artID','desc')->simplePaginate(6);
        for($i=0;$i<count($artPag);$i++){
            //去掉html标签
            $artPag[$i]->artContent = strip_tags($artPag[$i]->artHtml);
            if(strlen($artPag[$i]->artContent)>100){
                $artPag[$i]->artContent = mb_substr($artPag[$i]->artContent,0,100).'...';
            }
            //日期格式化
            $artPag[$i]->artTime = date('Y-m-d',strtotime($artPag[$i]->artTime));
        }
        //top文章
        $indexRec = DB::table('article')->orderBy('artId','desc')->where('artTop','=','yes')->get();
        $indexRecSend = array();
        //文章数量大于3，否则为1
        count($indexRec) >= 3 ? $indexI = 3 : $indexI = 1;
        for($i=0;$i<$indexI;$i++){
            $indexRecSend[$i] = $indexRec[$i];
            if(strlen($indexRecSend[$i]->artContent)>100){
                $indexRecSend[$i]->artContent = mb_substr($indexRecSend[$i]->artContent,0,100).'...';
            }
        }
        return response()
            ->view('mirror',['artInfo' => $artPag,'artTop'=>$indexRecSend]);
    }

    public function OldHome(Request $request){
        if($request->ajax()){
            //ajax的ip信息
            /**
             * visit (Id,vIp,vName,vTime)
             */
            //对ip进行打包
            $info = DB::table('visit')->where('vIp','=',$request['cityIp'])->first();
            if($info != null){
                $arrayJson = json_decode($info->vArray,true);
                $arrayJson[sizeof($arrayJson) + 1] = date(date('y-m-d H:i:s'));
                $json = json_encode($arrayJson);
                DB::update('update visit set vArray=? where vIp=?',[$json,$request['cityIp']]);
            }else{
                $ipInfo = array('1'=>date(date('y-m-d H:i:s')));
                $ipInfo = json_encode($ipInfo);
                DB::insert('insert into visit(vIp,vName,vArray) values (?,?,?)',[$request['cityIp'],$request['cityName'],$ipInfo]);
            }
            return response()->json(['ajaxId'=>$request['ajaxId'],'status'=>'success']);
        }
        //倒序
        $artPag = DB::table('article')->where('show','=','yes')->orderBy('artID','desc')->simplePaginate(6);
        for($i=0;$i<count($artPag);$i++){
            //去掉html标签
            $artPag[$i]->artContent = strip_tags($artPag[$i]->artHtml);
            if(strlen($artPag[$i]->artContent)>150){
                $artPag[$i]->artContent = mb_substr($artPag[$i]->artContent,0,150).'...';
            }
            //日期格式化
            $artPag[$i]->artTime = date('Y-m-d',strtotime($artPag[$i]->artTime));
        }
        //top文章
        $indexRec = DB::table('article')->orderBy('artId','desc')->where('artTop','=','yes')->get();
        $indexRecSend = array();
        //文章数量大于3，否则为1
        count($indexRec) >= 3 ? $indexI = 3 : $indexI = 1;
        for($i=0;$i<$indexI;$i++){
            $indexRecSend[$i] = $indexRec[$i];
            if(strlen($indexRecSend[$i]->artContent)>100){
                $indexRecSend[$i]->artContent = mb_substr($indexRecSend[$i]->artContent,0,100).'...';
            }
        }
        //转到新的Pink
        return response()
            ->view('home',['artInfo' => $artPag,'artTop'=>$indexRecSend]);
    }
}
