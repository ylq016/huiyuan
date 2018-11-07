<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<?php
SESSION_START(); 
if (isset($_POST['submit'])) { 
    if ($_SESSION['is_submit'] == '0') { 
        $_SESSION['is_submit'] = '1'; 
		require "post2.php";  
    } else { 
	
        echo "请不用重复提交<a href='pass.php?tj=register'>PHP+SESSION防止表单重复提交</a>"; 
    } 
}


?>