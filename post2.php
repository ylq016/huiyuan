<?php
require_once ('conf.php');
?>
<?php
if($_POST["submit"]){
if(empty($_POST['username']))
	echo "<script>alert('姓名不能为空');location='pass.php?tj=register';</script>";

else{
$riqi=date('Y-m-d');
$lurutime=date('Y-m-d h:s:t');
$reip=$_SERVER['SERVER_ADDR'];
$sql="insert into huiyuan values(null,'".$riqi."','".$_POST['username']."','".$_POST['sex']."','".$_POST['mobile']."','".$_POST['info']."','".$_POST['xiaoguo']."','".$lurutime."','".$reip."','".$_POST['payway']."','".$_POST['moneys']."','".$_POST['massagist']."')";

$result=mysql_query($sql)or die(mysql_error());
if($result)
echo "<script>alert('录入成功,请刷新');location='pass.php?tj=register';</script>";
else
{
	echo "<script>alert('录入失败');location='pass.php?tj=register';</script>";
	mysql_close();
}
	}
}
?>