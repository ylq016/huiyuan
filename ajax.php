<?php
	session_start();
	error_reporting(0);
	header("Content-type: text/html; charset=utf-8");
	require "config.php";
	@date_default_timezone_set(PRC);
	set_time_limit(0); 
	@ob_end_clean();
	ob_implicit_flush(true);
	switch($_GET['act']){
		case "database":
			
			$connect_db = mysql_connect($dbnhost, $dbnuser, $dbnpass);
			$select_db = mysql_select_db($dbname, $connect_db);
			mysql_query("SET NAMES 'UTF8'");
			mysql_query("SET CHARACTER SET UTF8");
	        mysql_query("SET CHARACTER_SET_RESULTS=UTF8");
			$rs = mysql_query("SHOW TABLES FROM $dbname");
			$tables = array();
			while ($row = mysql_fetch_row($rs)) {
				$tables[] = $row[0];
			}
			mysql_free_result($rs);
			$array_tj=count($tables);
			$count=1;
			$text="";
			foreach($tables as  $key=>$tableName){
				if($key==count($tables)-1){
					$dian="";
				}else{
					$dian=",";
				}
				$text=$text.'"'.$tableName.'"'.$dian;
				$count++;
			}
		echo "var database = new Array($text);";	
		break;
		case "select":
		
			$select_act=(int)addslashes(trim($_POST['select_act']));
			$match_act=(int)addslashes(trim($_POST['match_act']));
			$key=addslashes(trim($_POST['key']));
			$table=addslashes(trim($_POST['table']));
				if(empty($key) || $key==''){exit("请输入查询内容");}
				if(strlen($key)<2){exit("key length!!!");}
				
					$key = str_replace("_","\_",$key);
					$key = str_replace("%","\%",$key);
						switch($match_act){
							case 2:$key = '=\''.$key.'\'';break;
							case 1:$key = ' like \'%'.$key.'%\'';break;
							default:exit("");
						}
						switch($select_act){//查询方式
							case 1:$limits="username".$key;break;
							case 2:$limits="riqi".$key;break;
							case 3:$limits="username".$key."or riqi".$key;break;
							default:exit("");
						}
						    $connect_db = mysql_connect($dbnhost, $dbnuser, $dbnpass);
							$select_db = mysql_select_db($dbname, $connect_db);
							mysql_query("SET NAMES 'UTF8'");
							mysql_query("SET CHARACTER SET UTF8");
	                        mysql_query("SET CHARACTER_SET_RESULTS=UTF8");
						$sql="select $Field  from `$table` where $limits";
						////
						$sql2="select sum(moneys)as ss  from `$table` where $limits";
						$result2=mysql_query($sql2);
						$rows2=mysql_fetch_assoc($result2);
						$ss= mysql_real_escape_string($rows2['ss']);
						$sql3="select count(moneys) as ss3  from `$table` where $limits";
						$result3=mysql_query($sql3);
						$rows3=mysql_fetch_assoc($result3);
						$ss3= mysql_real_escape_string($rows3['ss3']);
						if($rows3['ss3']>0){
						$zong=$rows3['ss3']*100;
						$cha=$zong-$rows2['ss'];
						if($cha<0){$cha=0;}
						echo "addRow3(\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"$ss\",\"$cha\");";
						}
						////
						require "database.php";
							$databasename=database($table);
							if($result=mysql_query($sql)){
								while($rows=mysql_fetch_assoc($result)){
										$riqi= mysql_real_escape_string($rows['riqi']);
										$username= mysql_real_escape_string($rows['username']);
										$sex= mysql_real_escape_string($rows['sex']);
										$mobile= mysql_real_escape_string($rows['mobile']);
										$info= mysql_real_escape_string($rows['info']);
										$xiaoguo= mysql_real_escape_string($rows['xiaoguo']);
										$moneys= mysql_real_escape_string($rows['moneys']);
										echo "addRow(\"$riqi\",\"$username\",\"$sex\",\"$mobile\",\"$info\",\"$xiaoguo\",\"$moneys\");";
								}// end while
								
							}
					
		
		
		
		break;
		default:print_r("");
	}
	