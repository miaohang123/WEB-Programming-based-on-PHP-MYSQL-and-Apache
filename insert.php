<!DOCTYPE html>
<html>
<head>
<title>Insert</title>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="HTML CSS JS PHP MySQL" />
<link rel="stylesheet" href="insert.css" type="text/css" media="all" />
</head>

<body>
<div class = "c1">
    <p><b>插入数据</b><br></p>
    <ul class = "cute">
        <li class="subitem1"><a href="main_home.php">返回</a></li>
    </ul>
    <?php
        $nameErr = $stuNumErr = $genderErr = $gradeErr = $classERR = "";
        function test_input($data){
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          return $data;
        }
        $db = mysql_connect("localhost", "root");
        mysql_query("SET NAMES UTF-8");
        mysql_select_db("test", $db);
        if ($_POST[submit]) {
            //判断学号是否已经存在
            $legal_name = 0;
            $legal_stuNum = 0;
            $sql_judgeId = "SELECT * FROM students WHERE stu_num = $_POST[id]";
            $result = mysql_query($sql_judgeId);
            if (mysql_num_rows($result)){
                echo '<script type="text/javascript">alert("此学号已存在，请重新插入");</script>';
              }else{
                if(empty($_POST[name])){
                    $nameErr = "名字不能为空";
                }else{
                    $name = test_input($_POST["name"]);
                    // 检测名字是否只包含字母跟空格
                    if (!preg_match("/^[a-zA-Z ]*$/",$name)){
                      $nameErr = "只允许字母和空格"; 
                      $legal_name = 1;
                    }
                }
                if(empty($_POST[id])){
                    $stuNumErr = "学号不能为空";
                }else{
                    $stu_num = test_input($_POST[id]);
                    // 检测学号是否只包含数字
                    if (!preg_match("/^[0-9]*$/",$stu_num)){
                      $stuNumErr = "只允许字母和空格"; 
                      $legal_stuNum = 1;
                    }
                }
                if(empty($_POST[grade])){
                    $gradeErr = "分数不能为空";
                }else{
                    $grade = test_input($_POST[grade]);
                    if($grade < 0 || $grade > 100){
                      $gradeErr = "分数必须在0-100范围内";
                    }else{
                      if(!empty($_POST[name]) && !empty($_POST[id]) && !$legal_name && !$legal_stuNum){
                          $sql_insert = "INSERT INTO students (class, name, stu_num, gender, grade) VALUES ('$_POST[class]','$_POST[name]', '$_POST[id]', '$_POST[gender]', '$_POST[grade]')";
                          $result = mysql_query($sql_insert);            
                          header("Location: query.php");
                      }
                    }
                }
              }
            }
            /**/
      ?>
            <form action="<?php echo $_SERVER['SCRIPT_NAME'] . "?id=". "$id" ?>" method="post" class="update_form" name="form1">
            <h1>插入数据</h1>
            <label>
              <input placeholder="学号" id="stu_num" type="text" name="id">
              <span class="error">* <?php echo $stuNumErr;?></span>
              <br>
            </label>
            <label>
              <input placeholder="班级" id="class" type="text" name="class">
              <span class="error">* <?php echo $classErr;?></span>
              <br>
            </label>
            <label>
              <input placeholder="姓名" id="name" type="text" name="name" >
              <span class="error">* <?php echo $nameErr;?></span>
              <br>
            </label>
            <label>
              <select name="gender">
                <option value="NULL">性别</option>
                <option value="M">M</option>
                <option value="F">F</option>
              </select>      
              <span class="error">* <?php echo $genderErr;?></span>
              <br>
            </label>
            <label>
              <input placeholder="分数" id="grade" type="text" name="grade" >
              <span class="error">* <?php echo $gradeErr;?></span>
              <br>
              <br>
              <br>
            </label>
            <label>
              <input type="Submit" name="submit" class="submit" value="Insert"/>
            </label>
            </form>
  <?php
    mysql_close($db);
  ?>
</div>
</body>
</html>





