<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ArticleController extends Controller
{
    //
    public function articleShow(Request $request, $id){
        if($request->isMethod('post')){
            Log::info($request->input());
            $list = [$request['artId'],$request['name'],$request['email'],$request['text']];
            DB::insert('insert into comments(artId,name,email,text) values(?,?,?,?)',$list);
            return response()
                ->json(['yes']);
        }
        $art = DB::table('article');
        $artInfo = $art->get()->where('artId','=',$id)->first();
//        $artInfo->description = $artInfo->artTitle;
        //防止文章空页
        if ($art->get()->where('artId','=',$id)->first() == null){
            return redirect('/');
        }
        $comments = DB::table('comments')->where('artId','=',$id)->get();
        for ($i=0;$i<count($comments);$i++){
            $comments[$i]->text = str_replace('/n','<br>',$comments[$i]->text);
        }
        //前后文章的ID
        $afterID = $art->get()->where('artId','>',$id)->min("artId");
        $beforeID = $art->get()->where('artId','<',$id)->max("artId");
        return view('article',['artInfo'=>$artInfo,'cms'=>$comments,'bID'=>$beforeID,'aID'=>$afterID]);

//        if($request->cookie('visitorhistory'.$id) == null){
//            $cookieInfo = encrypt($id);
//            $historyV = DB::table('article')->where('artID','=',$id)->first()->visitors;
//            DB::update('update article set visitors = ? where artID = ?', [$historyV + 1, $id]);
//            return response()
//                ->view('article.artShow',['artInfo'=>$artInfo,'bID'=>$beforeID,'aID'=>$afterID,'color'=>$request->get('color')])
//                ->withCookie('visitorhistory'.$id,$cookieInfo,3600);
//        }else{
//            return view('article',['artInfo'=>$artInfo,'bID'=>$beforeID,'aID'=>$afterID]);
//        }
    }
}
