<?php
namespace app\index\controller;
use think\Controller;
use think\Request;
use think\View;
use think\Db;
use think\Cookie; 
use think\Cache; 

class Syno extends Common
{

	//公司信息添加
	public function add()
	{
		if(Request::instance()->isPost()){
			$data=input('post.');

			
			
			
			$res=Db::table('company')->insert($data);
			if($res){
			
				$this->redirect('syno/show');
			}else{
				$this->error('添加失败');
			}
		}else{

			
       		return $this->fetch('add');
		}

	}

	//展示
	public function show()
	{
		$page = input('get.page');
        if (empty($page)) {
            $page = 1;
        }
        //每页条数
        $size = 6;
        //总条数
        $nums = Db::name('company')->count();
        //总页数
        $page_num = ceil($nums/$size);
        // if($page>$page_num){
        // 	exit('已经是最后一页');
        // }
        $date['page'] = $page < 1 ? 1 : $page ;
        //上一页
        $date['up'] = $page-1 <= 1 ? 1 : $page-1;
        //下一页
        $date['next'] = $page+1 >= $page_num ? $page_num : $page+1;
       
        $date['nums'] = $nums;
        $date['page_num'] = $page_num;

        // var_dump($date);die;
		
		$data=Db::table('company')->page($page,$size)->select();

        $this->assign('date',$date);
		$this->assign('data',$data);
		
      	return $this->fetch('show');
	}


	//修改

	public function update()
	{
		if(Request::instance()->isGet()){
			$id=input('get.id');
			$data=Db::table('company')->where('company_id',$id)->find();
			$this->assign('data',$data);
			return $this->fetch('update');
		}else{
			$id=input('post.company_id');
			$post=input('post.');

			
			
			$res=Db::table('company')->where('company_id',$id)->update($post);

			if($res){
				$this->redirect('syno/show');
			}else{
				echo 111;
			}
		}
	}
}