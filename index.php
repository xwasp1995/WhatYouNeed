<?php
require './lib/phpQuery.php';
require './lib/QueryList.php';
use QL\QueryList;
error_reporting(0);

if($_GET){
    $url=$_GET['url'];
}else{
    $url="index_content.php";
}

  $url=str_replace("%","&",$url);
  $url=str_replace("!","#",$url);
  $judge=strchr("http://mp.weixin.qq.com/s?__",$url);

if($judge){
    error_reporting(0);
    $url=str_replace("%","&",$url);
    $url=str_replace("!","#",$url);
    $html = file_get_contents($url);
    //QueryList库查询页面部分源码
    $data = QueryList::Query($html,array(
    'title' => array('title','text'),
    'content' => array('#activity-detail','html'),
    ))->data;
}else{
    include $url;
}
 
?>


<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0"/>
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/project.css" rel="stylesheet">
    <script src="./js/jquery.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/project.js"></script>
  <title>WhatYouNeed</title>
  </head>
  <body>

    <!--导航栏-->
  <nav class="navbar navbar-default navbar-fixed-top" role="navigation" id="navbar">
   <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse"
         data-target="#example-navbar-collapse">

         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand">WhatYouNeed</a>

   </div>
   <div class="collapse navbar-collapse" id="example-navbar-collapse">
      <ul class="nav navbar-nav">
         <li class="active" id="index"><a href="./index.php?url=index_content.php">首页</a></li>
         <li class="" id="history"><a href="./index.php?url=history.php">历史文章</a></li>
         <li class="dropdown">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        关于 <b class="caret"></b>
                     </a>
                     <ul class="dropdown-menu">

                        <li><a href="javascript:shoot('全家福')">我们</a></li>
                        <li><a href="javascript:shoot('投稿须知')">投稿</a></li>
                        <li><a href="javascript:shoot('联系我们')">合作</a></li>
                     </ul>
                  </li>
      </ul>
   </div>
  </nav>

    <!-- 对话框 -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" 
   aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" 
               data-dismiss="modal" aria-hidden="true">
                  &times;
            </button>
            <h4 class="modal-title" id="myModalLabel">
              我要投稿
            </h4>
         </div>
         <div class="modal-body">
       
    <div class="content">
    
    </div>
        <div class="footer">
            
        </div>
   
             
         </div><!--body-->
        </div><!--content-->
      </div><!--dialog-->
     </div><!--modal-->

</nav>
<script>
      var url = $.getUrlParam('url');
      switch(url){
          case "history.php":
              $("#index").attr("class","");
              $("#history").attr("class","active");
              break;
          case "index_content.php":
              $("#index").attr("class","active");
              $("#history").attr("class","");
              break;
          default:

      }
</script>
 <?php
 if($data[0][content]===null){
 /*echo "null";*/
 }else{
 echo str_replace("我要WhatYouNeed</a>","</a>",$data[0][content]);};
 ?>
  </body>
</html>
