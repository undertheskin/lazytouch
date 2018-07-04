<?php

namespace app\index\controller;

use think\Controller;
use app\index\model\User as member;
use think\Request;

class User extends Controller
{
    /**
     * 会员注册
     */
    public function regster(member $member)
    {
        header('Content-Type: text/html; charset=utf-8');
        if (request()->isPost()) {
            $data = input('post.');
            $result = $this->validate($data, 'reg');
            if (true !== $result) {
                return $this->result('', 1, $result);
            }
            $userinfo = $member->where('username',$data['username'])->find();
            if($userinfo){
                return $this->result('',1,'用户名已经存在');
            }
            $data['password'] = md5($data['password']);

            $result = $member->insert($data);
            if($result){
                //后期这里设置积分
                $points = 10;
                $member->addpoints($data['username'],$points);
                return $this->result('',0,'注册成功');
            }
        }
        return view();
    }

    /**
     * 会员登录
     * @return \think\response\View
     */
    public function login(Request $request,member $member)
    {
        if($request->isPost()){
            $data = input('post.');
            $result = $this->validate($data, 'login');
            if (true !== $result) {
                return $this->result('', 1, $result);
            }
            $userinfo = $member->where('username',$data['username'])->find()->toArray();
            if(!($userinfo['username']==$data['username']&&$userinfo['password']==md5($data['password']))){
                return $this->result('',1,'账号或者密码错误,请重新输入');
            }
            cookie('userinfo',$userinfo,3600);
            return $this->result('',0,'登录成功');
        }
        return view();
    }

    public function loginout(){
        cookie('userinfo',null);
        return $this->success('退出成功');
    }
}
