<?php

namespace app\index\controller;

use think\Request;

class Entry extends Common
{
    //网站前台首页
    public function index(){

        return view();
    }

    //添加号码
    public function addnumber(Request $request){
        if($request->isPost()){
            $data = input('post.');
            $arr =  explode("\r",$data['ReportNo']);
            $count = count($arr);
            //应扣除的积分
            $points = -10*$count;
        }
        return view();
    }

}
