<?php
namespace app\index\validate;

use think\Validate;

class Login extends Validate
{
    protected $rule =   [
        ['username','require|/^1[34578]\d{9}$/','用户名不能为空|请输入正确的手机号码'],
        'password'   => 'require|alphaDash',
    ];

    protected $message  =   [
        'password.require' => '密码不能为空',
        'password.alphaDash'  => '密码必须为数字或者字母',
    ];

}