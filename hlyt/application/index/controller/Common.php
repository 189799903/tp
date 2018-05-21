<?php
namespace app\index\controller;
use think\Controller;
use think\Request;
use think\View;
use think\Db;
use think\Cookie; 
class Common extends Controller
{
      
      //验证
      public function __construct()
      {   
            parent::__construct();
             $cookie=Cookie::get('res');
             // var_dump($cookie);die;
              if (empty($cookie)) {
                $this->error('请先登录!','index/index');
              }
          // $user_id=cookie("admin_id");
          //，模仿取cookie值
          $user_id=$cookie['id'];
          //模仿cookie 名
          $user_name=$cookie['user_name'];
          if ($user_name=="admin") {
              $result=DB::table("permission")->select();
              // print_r($result);
          }else{
              $role_id=DB::table("user_role")->field("role_id")->where("user_id",$user_id)->select();
          // print_r($role_id);die;
          foreach ($role_id as $key => $value) {
              $arr[]=DB::table("role_permission")->field("permission_id")->where("role_id=".$value["role_id"])->select();

          }
          // print_r($arr);die;
          foreach ($arr as $key => $val) {
            foreach ($val as $k => $v) {
               $date[] = $v['permission_id'];
             } 
          }
          $date1=array_unique($date);
          // print_r($date1);die;
          $map=[];
      
          foreach ($date1 as $key => $value) {
              $sql="select * from permission where id=".$value;
              $result[] = Db::query($sql); 
          }

    
          foreach ($result as $key => $value) {
              foreach ($value as $k => $v) {
                    $result[$key]=$v; 
              }
           }
          }

          

       
          foreach ($result as $key => $value) {
              $aa=strpos($value['path'],"/");
              $aa=intval($aa);
              $cc=substr($value["path"], $aa+1);
              if ($cc=="dele" || $cc=="update") {
                  unset($result[$key]);
              }
          }
          // echo "<pre>";
          // print_r($result);die;
          $ss=model("power")->getselect($result);
          // echo "<pre>";
          // print_r($ss);die;
          // $data=Db::table("cms_admin")->find();
          // print_r($user_id);
          $this->assign("dddd",$ss);
          return $this->display("common/left");
          // return $this->fetch("Common/left",["list"=>$ss]);
          if (!$user_id) {
              $this->redirect("Index/login");
              die;
          }
          
      }


}