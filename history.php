<div style="margin-top:50px"></div>
<?php
use QL\QueryList;

if($_GET){
    $url=$_GET['url'];
}
$url="http://3.whatyouneed.sinaapp.com/list.html";
$html = file_get_contents($url);
$html = str_replace("&","%",$html);
$html = str_replace("#rd","!rd",$html);
$html = str_replace("http://mp.weixin.qq.com/s?__","./content.php?url=http://mp.weixin.qq.com/s?__",$html);
echo $html;
?>
