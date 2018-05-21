<?php
namespace app\index\controller;
use think\Controller;
use think\View;
 use think\Request;
use think\Db;
use think\Cookie; 
class Login extends Common
{

   public function index()
    {
        return $this->fetch('index');
    }
}