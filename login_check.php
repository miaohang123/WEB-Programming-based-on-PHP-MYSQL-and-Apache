<?php  
    if(isset($_POST["submit"]) && $_POST["submit"] == "登陆")  
    {  
        $user = $_POST["username"];  
        $psw = $_POST["password"];  
        if($user == "" || $psw == "")  
        {  
            echo "<script>alert('Please input username and password'); history.go(-1);</script>";  
        }  
        else  
        { 
            $db = mysql_connect("localhost","root");  
            mysql_select_db("test", $db);  
            mysql_query("SET NAMES UTF-8");  
            $sql = "SELECT username, password FROM user WHERE username = '$_POST[username]' and password = '$_POST[password]'";  
            $result = mysql_query($sql);  
            $num = mysql_num_rows($result); 
            if($num)  
            {  
                $row = mysql_fetch_array($result);  //将数据以索引方式储存在数组中  
                echo $row[0];  
                header("Location: main_home.php");
            }  
            else  
            {  
                echo "<script>alert('Wrong username or password');history.go(-1);</script>";  
            }  
        }  
    }  
    else  
    {  
        echo "<script>alert('Submit failed!'); history.go(-1);</script>";  
    }  
?>  