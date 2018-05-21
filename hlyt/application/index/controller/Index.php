<?php
namespace app\index\controller;
use think\Controller;
use think\View;
use think\Db;
use think\Cookie; 


class Index extends Controller
{
    public function index()
    {
        return $this->fetch('index');
    }
    public function login()
    {
        
        //var_dump($data);die;
        $user_name=$_POST['user_name'];
        $user_pwd=md5($_POST['password']);
        
            if($user_name=='')  
            {  
                echo "<script>alert('请输入用户名！'); history.go(-1);</script>"; 
            }
            if($user_pwd=='') 
            {
                     echo "<script>alert('请输密码！'); history.go(-1);</script>"; 
            }
        $data=array(
            'user_name'=>$user_name,
            'password'=>$user_pwd
        );
        $res=Db::table("User")->where($data)->find();
       // var_dump($res);die;
        if($res)
        {
           Cookie::set('res',$res);

            $this->redirect('login/index');
        }else{
             echo "<script>alert('账号或密码错误！');history.go(-1);</script>"; 
        }
}
           
 
     public  function loginOut()
    {
        Cookie::delete('res');
        echo "<script>alert('退出成功');location.href='./index'</script>";
    }

}
