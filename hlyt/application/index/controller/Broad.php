<?php
namespace app\index\controller;
use think\Controller;
use think\Request;
use think\View;
use think\Db;
use think\Cookie; 
use think\Cache; 
class Broad extends Common
{
	public function add()
	{
		if(Request::instance()->isPost()){
			$data=Request::instance()->Post();
			$slowing_sum[]=$data['slowing_sum'];
			$files = request()->file('slowing_img');
	
		 	foreach($files as $file){
		        // 移动到框架应用根目录/public/uploads/ 目录下
		          $info = $file->validate(['size'=>589985556,'ext'=>'jpg,png,gif'])->move(ROOT_PATH . 'public' . DS . 'uploads');
		        if($info){
		            // 成功上传后 获取上传信息
		            $arr[]['slowing_img']=$info->getSaveName();; 
		        }else{
		            // 上传失败获取错误信息
		            echo $file->getError();
		        }    
		    }
		    // print_r($arr);die;	
		    foreach ($arr as $key => $val) {
	    		$arr[$key]["slowing_img"]=$val["slowing_img"];
	    		$arr[$key]["slowing_sum"]=$data["slowing_sum"][$key];

	    		
		    }

		   foreach ($arr as $key => $value) {
		   	

		   	$res=Db::table('slowing')->insert($value);
		   }
		    

			if ($res) {
				$this->redirect('broad/show');
			}
			
		    
		}else{

			
       		return $this->fetch('add');
		}

	}


	//轮播图列表展示
	public function show(){
		

		$page = input('get.page');
        if (empty($page)) {
            $page = 1;
        }
        //每页条数
        $size = 6;
        //总条数
        $nums = Db::name('slowing')->count();
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
		
		$data=Db::table('slowing')->page($page,$size)->select();

        $this->assign('date',$date);
		$this->assign('data',$data);
		
      	return $this->fetch('show');
		
	}


	public function dele()
	{
		$id= input('get.id');
		$data=Db::table('slowing')->where('slowing_id',$id)->delete();
		if($data){
			$this->redirect('broad/show');
		}
	}
}