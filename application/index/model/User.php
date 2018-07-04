<?php

namespace app\index\model;

use think\Model;

class User extends Model
{
    protected $user;

    public function addpoints($username='',$points){
        $this->user = cookie('userinfo');
        if(!$username){
            $user = $this->where('id',$this->user['id'])->save();
        }else{
            $user = $this->where('username',$username)->insert();
        }
    }
}
