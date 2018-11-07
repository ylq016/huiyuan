
<!DOCTYPE html>
<HTML> 
<HEAD> 
<title>会员查询</title>

<script type="text/javascript">
if (window!=top)
top.location.href =window.location.href;
</script>
<?php 
error_reporting(0); // 
require_once ('conf.php'); 
//显示用户
$sql="select * from member where member_user='".$_SESSION['member']."'";
$rs=mysql_fetch_array(mysql_query($sql));
?>
<?php
//注销操作
if($_GET["tj"]=="destroy"){
session_destroy();
echo "<script>alert('退出成功');location='index.php';</script>";}
?>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand hidden-sm" href="/">会员查询</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="/">首页</a></li>
                          <?php 
	  if(empty($_SESSION['member'])){
	  ?> 
            <li class="dropdown">
              <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">登陆<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li class="">
                  <iframe class="wmff_zjkkzz" src="pass.php" align="center" width="300" height="200"    frameborder="0" scrolling="no"></iframe>
                </li>
                </li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">注册<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li>
                  <iframe class="wmff_zjkkzz" src="pass.php?tj=register" align="center" width="300" height="320"    frameborder="0" scrolling="no"></iframe>
                </li>
              </ul>
            </li>
            <li><a href="" target="_blank">论坛</a></li>
            <li><a href="">关于</a></li>
   
          </ul>
        </div>
      </div>
    </div>


<script type="text/javascript">function cnrv_msg(str){alert(str);}</script><style type="text/css"></style></head>
<body>

    <div class="jumbotron">
      <div  style="margin:0 auto;width: 1000px;"><br>
			<div class="h6">

<?php  }else{  ?>
			 
                          <li class="dropdown">
              <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">用户<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li class="">
			  用户名：<?php echo htmlspecialchars($rs['member_name']); ?> <br>用户：<strong><? echo $rs['member_user'];?></strong>

                </li>
                </li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">操作<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li>
                 <a href='index.php?tj=destroy'>注销本次登录</a>
                </li>
              </ul>
            </li>
            <li><a href="" target="_blank">论坛</a></li>
            <li><a href="">关于</a></li>
          </ul>
        </div>
      </div>
    </div>
  <?php }?>
  <div align="center">
  <iframe class="wmff_zjkkzz" src="pass.php?tj=register" align="center" width="840" height="180"    frameborder="0" scrolling="no"></iframe>
  <h2>会员信息查询</h2>
  </div>
  <SCRIPT LANGUAGE="Javascript"> 
   <html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="./static/css/bootstrap.css" rel="stylesheet">
	 <link href="./static/css/style.css" rel="stylesheet">
    <link href="./static/css/bootstrap.min.css" rel="stylesheet">
  <style type="text/css">
<!--
.STYLE2 {font-size: 80px}
-->
  </style>
</head>

      </div><!-- End Navbar -->
  <body>

  <script src="./static/js/jquery.js"></script>
  <script src="./static/js/system.js"></script>
  <script src="./static/js/administry.js"></script>
  <script src="./static/js/bootstrap.min.js"></script> 
  <script src="./ajax.php?act=database"></script>
<link rel="stylesheet" href="./static/css/bootstrap.min.css">
<link rel="stylesheet" href="./static/css/bootstrap-theme.min.css">
    <div class="jumbotron">
      <div  style="margin:0 auto;width: 1000px;"><br>
			<div class="h6">
			  <div class="jumbotron search-box">
  <p><span class="input-group">
    
  </span><span class="input-group">
  <select class="btn btn-success" id="match_act" name="match_act">
    <option value="1" selected="">模糊查询</option>
    <option value="2">精确查询</option>
  </select>
 
  <select class="btn btn-primary" id="select_act" name="select_act">
    <option class="btn-group" value="3" selected="">姓名或日期</option>
    <option  class="btn-group" value="1">姓名</option>
    <option class="btn-group" value="2">日期</option>
  </select>
  </span></p>
  <div id="jshint-pitch" class="alert alert-info scan-wait" style="display:none;margin-top:10px;font-size:14px">
   
  </div>
  <div id="scan-result-box" style="font-size:12px;">
    <div class="input-group"><span class="input-group-btn scan-but-span">
      <button type="button" class="btn btn-success" onClick="getdata();">查询</button>
      </span>
      <input value="<?php echo date('Y-m-d');?>"  name="key" class="form-control" id="key" >
    </div>
</div>
  <div class="alert alert-warning error-box" style="display:none;margin-top:10px;font-size:14px"></div>
</SCRIPT> 
<style type="text/css">
<!--
h1, h2, h3, h4, h5, h6, .button {
  font-family: 'Alfa Slab One', cursive;
  font-weight: 400;
}
h1 {
  font-size: 72px;
  margin-bottom: 0;
}
.logo {
  color: rgb(240,239,220);
}
.logo span {
  color: rgb(222,69,91);
}
.logo img {
  width: 113px;
  display: inline-block;
  vertical-align: bottom;
}
.bs-callout {
margin: 20px 0;
padding: 15px 30px 15px 15px;
border-left: 5px solid #000000;
}
.STYLE2 {font-size: 80px}
.STYLE2 {font-size: 100px}
.STYLE3 {color: #FF0000}
.STYLE5 {font-size: 12px}
.alert-info {
color: #000000;
background-color: #FFFFFF;
border-color: #000000;
}
.navbar-inverse {
-webkit-box-shadow: #000 0px 0px 5px;
-moz-box-shadow: rgba(0,0,0,1) -5px 0px 5px;
-o-box-shadow: rgba(0,0,0,1) 0px 0px 5px;
box-shadow: #000 0px 0px 5px;
border-bottom: 1px solid #999;}
.bs-callout {
padding: 10px 20px;
}
.mt0 {
margin-top: 0px;
}
.bs-callout-info {
border-left-color: #C0C0C0;
}
.bs-callout {
padding: 20px;
margin: 20px 0;
border: 1px solid #eee;
border-left-width: 5px;
border-radius: 3px;
}
.bs-callout-info {
border-left-color: #5bc0de;
}
.bs-callout {
margin: 20px 0;
padding: 15px 30px 15px 15px;
border-left: 5px solid #EEE;}
body {
font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
font-size: 13px;
line-height: 1.42857143;
color: #000000;
background-color: #fff;
}
.jumbotron {
padding: 30px;
margin-bottom: 30px;
font-size: 13px;
font-weight: 200;
line-height: 2.1428571435;
color: inherit;
background-color: #FFF;
}
div.progress span {
display: block;
margin-top: -5px;
padding: 0;
text-align: center;
width: 0;
-moz-box-shadow: 1px 0 1px rgba(0, 0, 0, 0.2);
-webkit-box-shadow: 1px 0 1px rgba(0, 0, 0, 0.2);
box-shadow: 1px 0 1px rgba(0, 0, 0, 0.2);
}
-->
 </style>

<div style="display:none;" id="selecting" class="progress progress-striped active progress-info"><span><b></b></span></div>
<table  style="font-size:12px;display:none;" id="my_table">
<thead>
<tr>
		<th width="10%">日期</th>
		<th width="10%">姓名</th>
		<th width="5%">性别</th>
		<th width="5%">电话</th>
		<th width="30%">主诉</th>
		<th width="10%">效果</th>
		<th width="10%">消费</th>
		<th width="10%">已付费</th>
		<th width="10%">未付费</th>
	</tr>
</thead>
<tbody id="value_tables3"></tbody>
<tbody id="value_tables"></tbody>
</table>
</div>
</div>
  <script src="./static/js/jquery.js"></script>
  <script src="./static/js/system.js"></script>
  <script src="./static/js/administry.js"></script>
  <script src="./static/js/bootstrap.min.js"></script>

<BODY> 
</BODY> 
</HTML>

