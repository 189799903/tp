<?php
namespace app\index\controller;
use think\Controller;
use think\Request;
use think\View;
use think\Db;
use think\Cookie; 
use think\Cache; 
use think\File;
class Cecha extends Common
{
	//展示清除缓存页面
    public function cecha()
    {
        return $this->fetch('cecha');
    }

    //清除缓存
    public function cleanCache()
    {
        array_map('unlink', glob(TEMP_PATH . '/*.php'));  
    	$res=rmdir(TEMP_PATH);  
        if($res){
            $this->redirect('cecha/cecha');
        }
    }
}