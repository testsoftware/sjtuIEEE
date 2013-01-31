<?php
session_start();
if (isset($_SESSION['id'])){
	$id = $_SESSION['id'];
}
else{
	echo "<script>alert('请登录!');</script>";
	echo "<script>window.location.href='login.php'</script>";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>StudentList</title>
<link href="../assets/css/bootstrap.min.css" rel="stylesheet">
<link href="../assets/css/bootstrap-responsive.css" rel="stylesheet">
<style type="text/css">
	.align *{
		text-align:center!important;
		vertical-align:middle!important;
	}
</style>
</head>
<body>
<div class="page-header">
	<h3>查看已选择您的学生</h3>
</div>

<div class="span9" >
	<h4>选择你的学生</h4><br />
<table class="align table table-striped table-bordered table-hover table-condensed">
<thead>
	<tr>
		<th><h4>#</h4></th>
		<th></th>
		<th><h4>姓名</h4></th>
		<th><h4>学号</h4></th>
		<th><h4>综合测评</h4></th>
		<th><h4>挂科数</h4></th>
		<th></th>
		<th><div class="span2"></div></th>
	</tr>
</thead>
<tbody>	
<?php
$conn=mysql_connect("localhost","IEEE","IEEE2011")  or die("Could not connect: " . mysql_error());
mysql_select_db("IEEE",$conn);
mysql_query("SET NAMES UTF8",$conn); 
$sql= mysql_query("SELECT * FROM selectRlt WHERE 导师一='$id' OR 导师二='$id' OR 导师三='$id'");
$cnt = 0;
$cnt2 = 0;
$chsone = array();
$chstwo = array();
$chsthree = array();
while($row = mysql_fetch_array($sql)){
	if($row['导师一'] == $id){$status = $row['状态一'];}
	elseif($row['导师二'] == $id){$status = $row['状态二'];}
	elseif($row['导师三'] == $id){$status = $row['状态三'];}
	else{$status = 0;}
	if ($status == 1){$chsone[] = $row['id'];}
	elseif ($status == 2){$chstwo[] = $row['id'];}
	elseif ($status == 3){$chsthree[] = $row['id'];}
}
foreach($chsthree as $stid){
	$cnt++;
	echo "<tr><td>".$cnt."</td>";
	$req = mysql_query("SELECT * FROM student where id='$stid'");
  	$info = mysql_fetch_assoc($req);
  	echo "<td> <img src='../".$info['photo']."' width=60px; /> </td>";
	echo "<form action='studentDetail.php' method='get'> ";
	echo "<td>".$info['姓名']."</td>";
	echo "<td>".$stid."</td>";
	echo "<td>".$info['综合测评']."</td>";
	echo "<td>".$info['挂科数']."</td>";
	echo "<input type='hidden' name='stid' value='".$stid."'/>";
	echo "<td> <button class='btn btn-info getstudentDetailform' type='submit'>详细</button> </td>";
	echo "</form>";
	echo "<td>"."双方已确认"."</td></tr>";
}
foreach($chstwo as $stid){
	$cnt++;
	echo "<tr><td>".$cnt."</td>";
	$req = mysql_query("SELECT * FROM student where id='$stid'");
  	$info = mysql_fetch_assoc($req);
  	echo "<td> <img src='../".$info['photo']."' width=60px; /> </td>";
	echo "<form action='studentDetail.php' method='get'> ";
	echo "<td>".$info['姓名']."</td>";
	echo "<td>".$stid."</td>";
	echo "<td>".$info['综合测评']."</td>";
	echo "<td>".$info['挂科数']."</td>";
	echo "<input type='hidden' name='stid' value='".$stid."'/>";
	echo "<td> <button class='btn btn-info' type='submit'>详细</button> </td>";
	echo "</form>";
	echo "<td>";
	echo "<form action='ccStDb.php' method='post'>";
	echo "<input type='hidden' name='stid' value='".$stid."' />";
	echo "<button class='btn btn-warning ccStDb' type='submit'>取消选择</button>";
	echo "</form>";
	echo "等待学生再次确认"."</td></tr>";
}
foreach($chsone as $stid){
	$cnt++;
	echo "<tr><td>".$cnt."</td>";
	$req = mysql_query("SELECT * FROM student where id='$stid'");
  	$info = mysql_fetch_assoc($req);
  	echo "<td> <img src='../".$info['photo']."' width=60px; /> </td>";
	echo "<form action='studentDetail.php' method='get'> ";
	echo "<td>".$info['姓名']."</td>";
	echo "<td>".$stid."</td>";
	echo "<td>".$info['综合测评']."</td>";
	echo "<td>".$info['挂科数']."</td>";
	echo "<input type='hidden' name='stid' value='".$stid."'/>";
	echo "<td> <button class='btn btn-info' type='submit'>详细</button> </td>";
	echo "</form>";
	echo "<td>";
	echo "<form action='sltStDb.php' method='post'>";
	echo "<input type='hidden' name='stid' value='".$stid."' />";
	echo "<button class='btn btn-success sltStDb' type='submit'>选择</button>";
	echo "</form>";
	echo "<form action='rejectStDb.php' method='post'>";
	echo "<input type='hidden' name='stid' value='".$stid."' />";
	echo "<button class='btn btn-danger rejectStDb' type='submit'>拒绝</button></form></td></tr>";
}
echo "</tbody></table></div>";
?>
<div class="span7" >
	<h4>选择放弃的学生</h4>
<table class="align table table-striped table-bordered table-hover table-condensed">
<thead>
	<tr>
		<th><h4>#</h4></th>
		<th></th>
		<th><h4>姓名</h4></th>
		<th><h4>学号</h4></th>
		<th><h4>综合测评</h4></th>
		<th><h4>挂科数</h4></th>
		<th></th>
	</tr>
</thead>
<tbody>
<?php	
$sql= mysql_query("SELECT 学生放弃记录 FROM mentorselectrlt WHERE id='$id'");
$row = mysql_fetch_assoc($sql);
$record = explode('|',$row['学生放弃记录']);
foreach ($record as $stid) 
{
	if ($stid == "") continue;
	$cnt2++;
	echo "<tr><td>".$cnt2."</td>";
	$req = mysql_query("SELECT * FROM student where id='$stid'");
  	$info = mysql_fetch_assoc($req);
	echo "<td> <img src='../".$info['photo']."' width=60px; /> </td>";
	echo "<form action='studentDetail.php' method='get'> ";
	echo "<td>".$info['姓名']."</td>";
	echo "<td>".$stid."</td>";
	echo "<td>".$info['综合测评']."</td>";
	echo "<td>".$info['挂科数']."</td>";
	echo "<input type='hidden' name='stid' value='".$stid."'/>";
	echo "<td> <button class='btn btn-info' type='submit'>详细</button></td></tr>";
}
echo "</tbody></table></div>";
mysql_close($conn);
?>
    <script src="../assets/js/jquery-1.8.3.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
 <script src="../js/selectst.js"></script>
</body>
</html>

