<!DOCTYPE html>
<html>
<head>
<title>Query</title>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="HTML CSS JS PHP MySQL" />
<!-- Style --> <link rel="stylesheet" href="query.css" type="text/css" media="all" />
</head>

<body>
<div class = "c1">
    <div class = "c2">
    </div>
    <p><b>学生成绩信息数据表</b><br></p>
    <ul class = "cute">
        <li class="subitem1"><a href="main_home.php">返回</a></li>
    </ul>
    <table width="100%" border="1" class="table table-hover" id="table1">
        <thead>
        <!--&#8595上箭头;  &#8593下箭头; -->
            <th width="100">NO.</th>   
            <th width="100">班级
                <?php 
                    printf("<a href=\"%s?sort1=%s\">&#8593</a>", $_SERVER['SCRIPT_NAME'],"class"); 
                    printf("<a href=\"%s?sort2=%s\">&#8595</a>", $_SERVER['SCRIPT_NAME'],"class");
                ?>
            </th>
            <th width="125">姓名</th>
            <th width="100">学号 
                <?php 
                    printf("<a href=\"%s?sort1=%s\">&#8593</a>", $_SERVER['SCRIPT_NAME'],"stu_num"); 
                    printf("<a href=\"%s?sort2=%s\">&#8595</a>", $_SERVER['SCRIPT_NAME'],"stu_num");
                ?>
            </th>      
            <th width="100">性别 </th>
            <th width="100">分数
            <?php 
                printf("<a href=\"%s?sort1=%s\">&#8593</a>", $_SERVER['SCRIPT_NAME'],"grade"); 
                printf("<a href=\"%s?sort2=%s\">&#8595</a>", $_SERVER['SCRIPT_NAME'],"grade")
                ?>
            </th>
            <th width="100">操作1</th>
            <th width="100">操作2</th>
            <span id="spanFirst">第一页</span> 
            <span>&nbsp;</span>
            <span id="spanPre">上一页</span> 
            <span>&nbsp;</span>
            <span id="spanNext">下一页</span> 
            <span>&nbsp;</span>
            <span id="spanLast">最后一页</span>
            <span>&nbsp;</span>第
            <span id="spanPageNum"></span>页/共
            <span id="spanTotalPage"></span>页
        </thead>
        <?php
            $db = mysql_connect("localhost", "root");
            mysql_query("SET NAMES UTF-8");
            mysql_select_db("test", $db);
            $sort1 = $_GET[sort1];
            $sort2 = $_GET[sort2];
            $sql_sort;
            switch ($sort1) {
                case 'grade':
                    $sql_sort = "SELECT * FROM students order by grade asc";
                    break;
                case 'stu_num':
                    $sql_sort = "SELECT * FROM students order by stu_num asc";
                    break;
                case 'class':
                    $sql_sort = "SELECT * FROM students order by class asc";
                    break;
                default:
                    switch ($sort2) {
                        case 'grade':
                            $sql_sort = "SELECT * FROM students order by grade desc";
                            break;
                        case 'stu_num':
                            $sql_sort = "SELECT * FROM students order by stu_num desc";
                            break;
                        case 'class':
                            $sql_sort = "SELECT * FROM students order by class desc";
                            break;
                        default:
                            $sql_sort = "SELECT * FROM students order by stu_num asc";
                            break;
                    }
            }
            if ($_GET[delete]) {  // delete a record
                $id = $_GET[id]; 
                $sql = "DELETE FROM students WHERE stu_num = $id";
                $result = mysql_query($sql);
            }
            $sort_result = mysql_query($sql_sort);    
            $count=0;
            while($row_result=mysql_fetch_array($sort_result)){
                $count++;
        ?>
                <tr>
                <td align="center"><b><?php echo $count ?></b></td>
                <td><?php echo $row_result["class"] ?></td>
                <td><?php echo $row_result["name"] ?></td>
                <td align="center"><?php echo $row_result["stu_num"] ?></td>
                <td align="center"><?php echo $row_result["gender"] ?></td>
                <td align="center"><?php echo $row_result["grade"] ?></td>
                <td><a href="update.php? id=<?php echo $row_result['stu_num'];?>">Update</a></td>
                <td><a href="?delete=yes &id=<?php echo $row_result['stu_num'];?>" onclick="delcfm()">Delete</a></td>
                <script type="text/javascript">
                    function delcfm() { 
                        if (!confirm("确认要删除？")) { 
                            window.event.returnValue = false; 
                        } 
                    } 
                </script>
            <?php
             }
            ?>
    </tr>
    </table>
    <?php 
        mysql_close($db);
    ?>
</div>
</body>
</html>
 <script>
     var theTable = document.getElementById("table1");
     var totalPage = document.getElementById("spanTotalPage");
     var pageNum = document.getElementById("spanPageNum");  //页数

     var spanPre = document.getElementById("spanPre");      //前一页
     var spanNext = document.getElementById("spanNext");    //下一页
     var spanFirst = document.getElementById("spanFirst");  //第一页
     var spanLast = document.getElementById("spanLast");    //最后一页

     var numberRowsInTable = theTable.rows.length;
     var pageSize = 10;                                    //一页最多行数
     var page = 1;
     //下一页
     function next() {
         hideTable();
         currentRow = pageSize * page;
         maxRow = currentRow + pageSize;
         if (maxRow > numberRowsInTable) maxRow = numberRowsInTable;
         for (var i = currentRow; i < maxRow; i++) {
             theTable.rows[i].style.display = '';
         }
         page++;
         if (maxRow == numberRowsInTable) { nextText(); lastText(); }
         showPage();
         preLink();
         firstLink();
     }
     //上一页
     function pre() {
         hideTable();
         page--;
         currentRow = pageSize * page;
         maxRow = currentRow - pageSize;
         if (currentRow > numberRowsInTable) currentRow = numberRowsInTable;
         for (var i = maxRow; i < currentRow; i++) {
             theTable.rows[i].style.display = '';
         }
         if (maxRow == 0) { preText(); firstText(); }
         showPage();
         nextLink();
         lastLink();
     }
     //第一页
     function first() {
         hideTable();
         page = 1;
         for (var i = 0; i < pageSize; i++) {
             theTable.rows[i].style.display = '';
         }
         showPage();
         preText();
         nextLink();
         lastLink();
     }
     //最后一页
     function last() {
         hideTable();
         page = pageCount();
         currentRow = pageSize * (page - 1);
         for (var i = currentRow; i < numberRowsInTable; i++) {
             theTable.rows[i].style.display = '';
         }
         showPage();
         preLink();
         nextText();
         firstLink();
     }
     function hideTable() {
         for (var i = 0; i < numberRowsInTable; i++) {
             theTable.rows[i].style.display = 'none';
         }
     }
     function showPage() {
         pageNum.innerHTML = page;
     }

     //总共页数
     function pageCount() {
         var count = 0;
         if (numberRowsInTable % pageSize != 0) count = 1;
         return parseInt(numberRowsInTable / pageSize) + count;
     }
     //显示链接
     function preLink() { spanPre.innerHTML = "<a href='javascript:pre();'>上一页</a>"; }
     function preText() { spanPre.innerHTML = "上一页"; }
     function nextLink() { spanNext.innerHTML = "<a href='javascript:next();'>下一页</a>"; }
     function nextText() { spanNext.innerHTML = "下一页"; }
     function firstLink() { spanFirst.innerHTML = "<a href='javascript:first();'>第一页</a>"; }
     function firstText() { spanFirst.innerHTML = "第一页"; }
     function lastLink() { spanLast.innerHTML = "<a href='javascript:last();'>最后一页</a>"; }
     function lastText() { spanLast.innerHTML = "最后一页"; }
     //隐藏表格
     function hide() {
         for (var i = pageSize; i < numberRowsInTable; i++) {
             theTable.rows[i].style.display = 'none';
         }
         totalPage.innerHTML = pageCount();
         pageNum.innerHTML = '1';
         nextLink();
         lastLink();
     }
     hide();
</script>





