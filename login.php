<!DOCTYPE html>
<html>
<head>
<title>Homepage of Web Task</title>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="HTML CSS JS PHP MySQL" />
<style type="text/css" media="screen">
	body,table{
        font-size:15px;
        background: url(bupt3.jpg) no-repeat #FFF;
        background-repeat: no-repeat;
    	background-attachment: fixed;
    	background-position: center;
    	background-size: cover;
    }
    h1 {
    	text-align: center;
    	margin: 50px 0 30px 0;
    	font-family: Nunito-Regular;
    	font-size: 50px;
	}
    .container {
		width: 25%;
  		margin: 0 auto;
  		padding: 150px 30px 20px 20px;
	}
	.container label {
		width: 100%;
    	display: block;
    	font-size: 20px;
    	text-decoration: none;
    	border-bottom: 1px solid #333;
    	line-height: 3em;
    	color: #fff;
    	background-color: rgba(66, 76, 85, 0.48);
    	font-family: Cabin-Regular;
    	text-align: center;
    	letter-spacing: 2px;
    }
    .submit{
		margin-left:auto;
		margin-right:auto;
		background-color: white;
		height: 40px;
    	width: 60px;
	}
	a:link { text-decoration: none;color:gray}
	a:visited { text-decoration:none;color: black}
</style>
</head>
<body>
<div class="container">
<form class="login_form" action="login_check.php" method="post">  
	<label>
    用户名：<input type="text" name="username"/> 
    <br> 
    </label>
    <label>
    密　码:<input type="password" name="password"/>  
    <br>
    </label>
    <label>  
    <input class="submit" type="submit" name="submit" value="登陆" /> 
    <a href="register.php">注册</a>
    <br>
    </label>        
    
</div>
</form>  
</body>
</html>