<?php
namespace app\index\controller;
use think\Controller;
use think\Request;
use think\View;
use think\Db;
use think\Cookie; 

class renshi extends Common
{
    public function index()
    {
        return $this->fetch('index');
    }
    
    public function roleadd()
    {
        return $this->fetch("roleadd");
    }
  
}