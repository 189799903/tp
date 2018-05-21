<?php
namespace app\index\model;

use think\Model;

class Power extends Model
{
     public function getselect($data,$cate_pid=0)
     {
     	$new_arr=array();
     	foreach ($data as $key => $value) {
     		if ($value['p_id']==$cate_pid) {
     			$new_arr[$key]=$value;
     			$new_arr[$key]["son"]=$this->getselect($data,$value['id']);
     		}
     	}
     	return $new_arr;
     }	
     public function getfind($data,$cate_id=0,$level=1)
     {
          static $new_arr=array();
          foreach ($data as $key => $value) {
               if ($value['p_id']==$cate_id) {
               	    $value["level"]=$level;
                    $new_arr[]=$value;
                    $this->getfind($data,$value["id"],$level+1);
               }
          }
          return $new_arr;
     }
}