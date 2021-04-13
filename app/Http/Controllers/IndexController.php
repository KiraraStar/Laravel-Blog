<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use PHPUnit\Util\Test;

class IndexController extends Controller
{
    //

    public function api(Request $request){
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Credentials: true");
        header("Access-Control-Allow-Methods: *");
        header("Access-Control-Allow-Headers: Content-Type,Access-Token");
        header("Access-Control-Expose-Headers: *");
        if ($request->isMethod('post')){
            Log::info($request->input());
            $jd = [
                'get'=>'igetthismsg',
            ];
            return response()
                ->json($jd);
        }
        $jsonData = [
            'ori'=> [
                ['title'=>'书1', 'author'=>'a1', 'price'=>'100'],
                ['title'=>'书2', 'author'=>'a2', 'price'=>'200'],
            ],
            'price'=>[
                'p1'=>120,
                'p2'=>300,
            ]
        ];
        $artInfo = DB::table('article')->get()->all();
        return response()
            ->json($artInfo);
    }
}
