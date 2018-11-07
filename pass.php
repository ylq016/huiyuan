<?php
SESSION_START(); 
$_SESSION['is_submit']=0;
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="./static/css/style.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="./static/css/bootstrap.min.css">
<style type="text/css">
<!--
body,td,th {
	color: #000000;
}
body {
	background-color: #FFFFFF;
}
.STYLE2 {font-size: 12px; }
-->
</style></head>
<body>


<?php if($_GET['tj'] == 'register'){ ?>
<form id="theForm" name="theForm" method="post" action="post.php" onSubmit="return chk(this)" runat="server" style="margin-bottom:0px;" autocomplete="off">
<table>
      <td>姓名:<input  placeholder=""  name="username" type="text" class="form-control" id="username" size="20" maxlength="20" /></td>
   
      <td>性别:<input placeholder="" name="sex" type="text" class="form-control" id="sex" size="20" maxlength="20" /></td>
    
      <td>联系电话<input placeholder="" name="mobile" value="1" type="text" class="form-control" id="mobile" size="20" /></td>
    
     <td>费用:<input placeholder="" name="moneys" value="100" type="text" class="form-control" id="moneys" size="20" /></td>
    </tr>
    <tr><br>
<td>按摩师:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp支付方式:<br>
  <select class="btn btn-success" id="massagist" name="massagist">
    <option value="杨林泉" selected="">杨林泉</option>
    <option value="杨天广">杨天广</option>
    <option value="王菲">王菲</option>
  </select>


<select class="btn btn-success" id="payway" name="payway">
    <option value="微信" selected="">微信</option>
    <option value="现金">现金</option>
    <option value="支付宝">支付宝</option>
  </select></td>
      <td>主诉:<input placeholder="" name="info" type="text" class="form-control" id="info" size="20" />
      <label></label></td>
   
      <td>效果:<input  placeholder=""  name="xiaoguo" type="text" class="form-control" id="xiaoguo" size="20"/></td>
  

      <td colspan="1" align="center" bgcolor="#FFFFFF"><br>
        <input name="submit" type="submit" class="btn btn-success" id="submit" value="确定" />
      </td>
    </tr>
  </table>
  
  <!-- <iframe height="100%" width="100%" src="huiyuan"></iframe> -->
</form>

<?php
} 
	if($_GET['tj']== ''){
?>
<?php
if($_POST["submit2"]){
$name=$_POST['name'];
$pw=md5($_POST['password']);
$sql="select * from member where member_user='".$name."'"; 
$result=mysql_query($sql) or die("账号不正确");
$num=mysql_num_rows($result);
if($num==0){
	echo "<script>alert('帐号不存在');location='pass.php';</script>";
	}
while($rs=mysql_fetch_object($result))
{
	if($rs->member_password!=$pw)
	{
		echo "<script>alert('密码不正确');location='pass.php';</script>";
		mysql_close();
	}
	else 
	{
		$_SESSION['member']=$_POST['name'];
		header('Location:/index.php');
		mysql_close();
		}
	}
}
?>
<form action="" method="post" name="regform" onSubmit="return Checklogin();" style="margin-bottom:0px;">
<table width="229" height="132" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#00FF00" bgcolor="#000000">
    <tr>

      <td width="4" rowspan="2" align="center" class="h5">&nbsp;</td>
      <td width="299" height="60" class="font"><div align="left">
        <input placeholder="用户名~" name="name" type="text" class="form-control" id="name">
      </div></td>
    </tr>
    <tr>
      <br>
      <td class="font"><input placeholder="密码~" name="password" type="password" class="form-control" id="name">        </td>
    </tr>
    <tr>
    <td colspan="2" align="center" valign="top" class="font"><div align="right">
      <input name="submit2" type="submit" class="btn btn-success" value="会员登录"/>
    </div></td>
  </tr>
</table>
</form>
<?php } ?>
    
</body>
</html>