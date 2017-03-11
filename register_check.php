<?php
	if(isset($_POST["Submit"]) && $_POST["Submit"] == "注册")
	{
		$user = $_POST["username"];
		$psw = $_POST["password"];
		$psw_confirm = $_POST["confirm"];
		if($user == "" || $psw == "" || $psw_confirm == "")
		{
			echo "<script>alert('Please insure the information is completed.'); history.go(-1);</script>";
		}
		else
		{
			if($psw == $psw_confirm)
			{
				$db = mysql_connect("localhost","root");	//连接数据库
				mysql_select_db("test", $db);  
            	mysql_query("SET NAMES UTF-8"); 
				$sql = "SELECT username FROM user WHERE username = '$_POST[username]'";	//SQL语句
				$result = mysql_query($sql);	//执行SQL语句
				$num = mysql_num_rows($result);	//统计执行结果影响的行数
				if($num)	//如果已经存在该用户
				{
					echo "<script>alert('The username has aleady been registered.'); history.go(-1);</script>";
				}
				else	//不存在当前注册用户名称
				{
					$sql_insert = "INSERT INTO user (username,password) VALUES('$_POST[username]','$_POST[password]')";
					$res_insert = mysql_query($sql_insert);
					//$num_insert = mysql_num_rows($res_insert);
					if($res_insert)
					{
						echo "<script>alert('Register successfully!'); history.go(-1);</script>";
						header("Location: login.php");
					}
					else
					{
						echo "<script>alert('Busy, please try later！''); history.go(-1);</script>";
					}
				}
			}
			else
			{
				echo "<script>alert('密码不一致！'); history.go(-1);</script>";
			}
		}
	}
	else
	{
		echo "<script>alert('提交未成功！'); history.go(-1);</script>";
	}
?>