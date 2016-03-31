<?php
    require './lib/phpQuery.php';
    require './lib/QueryList.php';
    error_reporting(0);
    use QL\QueryList;
    if($_GET){
        $url=$_GET['url'];
    }
    $url=str_replace("%","&",$url);
    $url=str_replace("!","#",$url);
    $html = file_get_contents($url);

    //QueryList库查询页面部分源码
    $data = QueryList::Query($html,array(
        'title' => array('title','text'),
        'content' => array('#activity-detail','html'),
        ))->data;
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta name="format-detection" content="telephone=no" charset="UTF-8">
        <title><?php echo $data[0][title];?></title>
        <link href="http://libs.baidu.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
    <script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
    <script src="http://libs.baidu.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
        <script src="./js/project.js"></script>
    </head>
    <body ontouchstart>
        <section class="ui-container">

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
         <li><a href="./index.php?url=index_content.php">首页</a></li>
         <li ><a href="./index.php?url=history.php">历史文章</a></li>
         <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
               关于 <b class="caret"></b>
            </a>
            <ul class="dropdown-menu">
               
               <li><a href="javascript:shoot('我们')">我们</a></li>
               <li><a href="javascript:shoot('投稿须知')">投稿</a></li>
               <li><a href="javascript:shoot('联系我们')">合作</a></li>
            </ul>
         </li>
      </ul>
   </div>
  </nav> 
<div style="margin-top:50px"></div>

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
        </section>
<?php
    if($data[0][content]===null){
        //echo "null";
    }else{
        echo str_replace("我要WhatYouNeed</a>","</a>",$data[0][content]);
    };
?>
<p style="line-height: 25.6px; white-space: normal; max-width: 100%; min-height: 1em; color: rgb(62, 62, 62); text-align: center; background-color: rgb(255, 255, 255); box-sizing: border-box !important; word-wrap: break-word !important;"><span style="max-width: 100%; color: rgb(136, 136, 136); font-size: 14px; box-sizing: border-box !important; word-wrap: break-word !important;">想看完整图文？</span></p>                 
<p style="line-height: 25.6px; white-space: normal; text-align: center;"><span style="color: rgb(136, 136, 136); font-size: 14px;"><img src="./image/qrcode.png" style="width: auto ! important; visibility: visible ! important; height: auto ! important;" data-s="300,640" data-type="png"  data-ratio="0.448207171314741"><br></span></p>
    </body>
</html>
