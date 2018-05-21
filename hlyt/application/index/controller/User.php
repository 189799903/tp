<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use think\Request;
use think\Cookie;
use think\Backup;
class User extends Common
{
	/*
	*用户信息展示、修改
	*/
	public function index()
	{
		if(Request::instance()->isPost()){
			$id=input('post.id');
			$post=input('post.');
			$res=Db::table('user')->where('id',$id)->update($post);

			if($res){
				$this->redirect('user/index');
			}else{
				echo 111;
			}

		}else{
			$cookie=Cookie::get('res');
			$id=$cookie['id'];
			$data=Db::table("User")->where('id',$id)->find();
			// var_dump($data);die;
			return $this->fetch('index',['data'=>$data]);
		}
		
	}

	/*
	*修改密码页面展示和修改
	*/
	public function update()
	{
		if(Request::instance()->isPost()){
			$old=input('post.old');
			$new=input('post.new');
			$newp=input('post.newp');
			if($new==$newp){
				$cookie=Cookie::get('res');
				$id=$cookie['id'];
				$data=Db::table("User")->where('id',$id)->find();
				if(md5($old)==$data['password']){
					$res=Db::table('user')->where('id',$id)->update(['password'=>md5($new)]);
					if($res){
						$this->redirect('user/update');
					}else{
						echo "<script>alert('修改失败');history.go(-1);</script>";
					}
				}else{
					echo "<script>alert('原密码错误');history.go(-1);</script>";
				}
			}else{
				echo "<script>alert('新密码与确认密码不一致');history.go(-1);</script>";
			}

		}else{
			
			return $this->fetch('update');
		}
	}
}