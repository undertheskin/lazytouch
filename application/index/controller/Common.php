<?php
namespace app\index\controller;
use think\Controller;
class Common extends Controller{
    public function _initialize()
    {
      $userinfo = cookie('userinfo');
      if(!$userinfo){
          $this->redirect('/login');
      }
    }
}