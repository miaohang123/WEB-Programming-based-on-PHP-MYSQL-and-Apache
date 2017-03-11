<!DOCTYPE html>
<html>
<head>
<title>Update</title>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="HTML CSS JS PHP MySQL" />
<link rel="stylesheet" href="update.css" type="text/css" media="all" />
</head>
<body>
<div class = "c1">
    <div class = "c2">
    </div>
    <p><b>修改数据表</b><br></p>
    <ul class = "cute">
        <li class="subitem1"><a href="main_home.php">返回</a></li>
    </ul>
    <?php
        $db = mysql_connect("localhost", "root");
        mysql_query("SET NAMES UTF-8");
        mysql_select_db("test", $db);
        $id = $_GET[id]; 
        //echo $id;
        if ($_POST[submit]) {
            if ($id) {  //提交表单，更新数据库，并跳转到查询页
                $sql_update = "UPDATE students SET class = '$_POST[class]', name = '$_POST[name]', gender = '$_POST[gender]', grade = '$_POST[grade]' WHERE stu_num = $id";
                $result = mysql_query($sql_update);            
                header("Location: query.php");
            }
        }else{
            if ($id) {  //未提交，显示当前要修改学生的信息
              $sql_query = "SELECT * FROM students WHERE stu_num=$id";
              $result = mysql_query($sql_query);
              $myrow = mysql_fetch_array($result);
              //echo "未提交表单";
      ?>
              <div class="container">
              <form class="update_form" action="<?php echo $_SERVER['SCRIPT_NAME'] . "?id=". "$id" ?>" method="post" >
              <h1><b>更新</b></h1>
              <label><!--placeholder="班级"-->
                <span>班级:</span>
                <input id="class" type="text" name="class" value=<?php echo $myrow['class']; ?>>
              </label>
              <label>
                <span>姓名:</span>
                <input id="name" type="text" name="name" value=<?php echo $myrow['name']; ?> >
              </label>
              <label>
                <span>性别:</span>
                <select name="gender">
                <option value="F">F</option>
                <option value="M">M</option>
                </select>      
              </label>
              <label>
                <span>分数:</span>
                <input id="grade" type="text" name="grade" value=<?php echo $myrow['grade']; ?> >
              </label>
              <label>
                <span>&nbsp;</span>
                <input type="Submit" name="submit" class="submit" value="Update" >
              </label>
              <label>
                <span>&nbsp;</span>
                <!-- <input type="button" onclick="back()" name="back"  value="home" /> -->
              </label>
          </form>
          </div>
  <?php
    }else{
      header("Location: query.php");
    }
}
  mysql_close($db);
  ?>
</div>
</body>
</html>





