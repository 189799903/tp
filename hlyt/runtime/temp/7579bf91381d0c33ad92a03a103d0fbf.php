<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:76:"E:\phpstudy\WWW\hlyt\hlyt\public/../application/index\view\recruit\show.html";i:1526370866;s:67:"E:\phpstudy\WWW\hlyt\hlyt\application\index\view\common\header.html";i:1526365374;s:65:"E:\phpstudy\WWW\hlyt\hlyt\application\index\view\common\left.html";i:1526625187;}*/ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dream</title>
    <!-- Bootstrap Styles-->
    <link href="/assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="/assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Morris Chart Styles-->
    <link href="/assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="/assets/css/custom-styles.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>

<body>
  <div id="wrapper">
        <!--/. NAV TOP  -->
       <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Dream</a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Doe</strong>
                                    <span class="pull-right text-muted">
                                        <em>Today</em>
                                    </span>
                                </div>
                                <div>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem Ipsum has been the industry's standard dummy text ever since an kwilnw...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem Ipsum has been the industry's standard dummy text ever since the...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>Read All Messages</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-tasks fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-tasks">
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 1</strong>
                                        <span class="pull-right text-muted">60% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                            <span class="sr-only">60% Complete (success)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 2</strong>
                                        <span class="pull-right text-muted">28% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="28" aria-valuemin="0" aria-valuemax="100" style="width: 28%">
                                            <span class="sr-only">28% Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 3</strong>
                                        <span class="pull-right text-muted">60% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                            <span class="sr-only">60% Complete (warning)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 4</strong>
                                        <span class="pull-right text-muted">85% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 85%">
                                            <span class="sr-only">85% Complete (danger)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Tasks</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-tasks -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> New Comment
                                    <span class="pull-right text-muted small">4 min</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small">12 min</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> Message Sent
                                    <span class="pull-right text-muted small">4 min</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-tasks fa-fw"></i> New Task
                                    <span class="pull-right text-muted small">4 min</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small">4 min</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> 用户中心</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> 用户设置</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="/index/index/loginOut"><i class="fa fa-sign-out fa-fw"></i> 退出</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
        </nav> 

        <!--/. NAV TOP  -->
      <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                   <?php if(is_array($dddd) || $dddd instanceof \think\Collection || $dddd instanceof \think\Paginator): $i = 0; $__LIST__ = $dddd;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <li>
                                                       <a href="javascript:void(0)"><i class="fa fa-sitemap"></i> <?php echo $vo['name']; ?><span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                   
                            <?php if(is_array($vo['son']) || $vo['son'] instanceof \think\Collection || $vo['son'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['son'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>

                             <li>
                                <a href="/index/<?php echo $v['path']; ?>"><?php echo $v['name']; ?><span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                   <?php if(is_array($v['son']) || $v['son'] instanceof \think\Collection || $v['son'] instanceof \think\Paginator): $i = 0; $__LIST__ = $v['son'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$va): $mod = ($i % 2 );++$i;?> 
                                    <li>
                                        <a href="<?php echo url($va['path']); ?>"><?php echo $va['name']; ?></a>
                                    </li>

                                    <?php endforeach; endif; else: echo "" ;endif; ?>

                                        </ul>

                                    </li>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </ul>
                            </li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                  </ul>

            </div>
        </nav> 
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
			 <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Tables Page <small>翰林云通</small>
                        </h1>
                    </div>
                </div> 
                 <!-- /. ROW  -->
               
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           招聘信息展示
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>职位名称</th>
                                            <th>职位类别</th>
                                            <th>招聘人数</th>
                                            <th>工作地点</th>
                                            <th>招聘时效</th>
                                            <th>任职要求</th>
                                            <th>悬赏金额</th>
                                            <th>操作</th>
                                        </tr>
                                    </thead>
                            <tbody>
                                <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                                <tr class="gradeU">
                                    <td><?php echo $v['r_id']; ?></td>
                                    <td><?php echo $v['r_name']; ?></td>
                                    <td><?php echo $v['r_type']; ?></td>
                                    <td><?php echo $v['r_num']; ?></td>
                                    <td><?php echo $v['r_region']; ?></td>
                                    <td><?php echo $v['r_expiryTime']; ?></td>
                                    <td><?php echo $v['r_demand']; ?></td>
                                    <td><?php echo $v['r_money']; ?></td>
                                    <td><?php if($v['r_place'] == 1): ?>郑州
                                    <?php else: ?>郑东新区
                                    <?php endif; ?>
                                </td>
                                    <td><button onclick="del(<?php echo $v['r_id']; ?>,<?php echo $p['page']; ?>)" >删除</button><a href="<?php echo url('recruit/update'); ?>?id=<?php echo $v['r_id']; ?>">修改</a></td>
                                </tr>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </tbody>
                                </table>
                                <div>
        当前<?php echo $p['page']; ?>页
          <button onclick="javascript:page(1)">首页</button>
        <button onclick="javascript:page(<?php echo $p['prev']; ?>)">上一页</button>
        <button onclick="javascript:page(<?php echo $p['next']; ?>)">下一页</button>
        <button onclick="javascript:page(<?php echo $p['total']; ?>)">尾页</button>
        共 <?php echo $p['total']; ?>页
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
             
       
        </div>
            
    </div>
             <!-- /. PAGE INNER  -->
            </div>
 
    <script src="/assets/js/jquery-1.10.2.js"></script>
      <!-- Bootstrap Js -->
    <script src="/assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="/assets/js/jquery.metisMenu.js"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="/assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="/assets/js/dataTables/dataTables.bootstrap.js"></script>
      <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>

    <script src="/assets/js/custom-scripts.js"></script>
    
   
</body>
<script>
    function del(id,page){
    var xhr=new XMLHttpRequest();
    xhr.open('get',"<?php echo url('recruit/dele'); ?>?id="+id+"&page="+page);
    xhr.send();
    xhr.onreadystatechange=function(){
      if (xhr.readyState==4&&xhr.status==200) {
      var respon=xhr.responseText
          var  data=eval("("+respon+")");
        var  content=data.content;
          var str="";
         if(data.msg==1){
        for(var i=0;i<content.length;i++)
                        {
  str+="<tr class='gradeU'><td>"+content[i]['r_id']+"</td>";
str+="<td>"+content[i]['r_name']+"</td>";
str+="<td>"+content[i]['r_type']+"</td>";
str+="<td>"+content[i]['r_num']+"</td>";
str+="<td>"+content[i]['r_region']+"</td>";
str+="<td>"+content[i]['r_expiryTime']+"</td>";
str+="<td>"+content[i]['r_demand']+"</td>";
str+="<td>"+content[i]['r_money']+"</td>";
if (content[i]['r_repalce']==1) {
str+="<td>郑州</td>";
}else{
  str+="<td>郑东新区</td>";  
}
str+="<td><button onclick='del("+content[i]['r_id']+","+content[i]['page']+")' >删除</button><a href='/index/recruit/dele?id="+content[i]['r_id']+"'>修改</a></td></tr>";
document.getElementsByTagName('tbody')[0].innerHTML=str;
      };
    }else{
        alert('删除失败')
    }
}
}
}
    function page(page){
    var xhr=new XMLHttpRequest();
    xhr.open('get',"<?php echo url('recruit/show'); ?>?page="+page);
    xhr.send();
    xhr.onreadystatechange=function(){
      if (xhr.readyState==4&&xhr.status==200) {
        document.getElementById('wrapper').innerHTML=xhr.responseText
      };
    }
  }
</script>
</html>
