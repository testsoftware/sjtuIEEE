<?php
session_start();
if (isset($_SESSION['id'])){
	$id = $_SESSION['id'];
}
else{
	echo "<script>alert('请登录!');</script>";
	echo "<script>window.location.href='mentorLogin.php'</script>";
}
?>
<!DOCTYPE html >
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
    	<h3>我的学生</h3>
	</div>
<div class="span8" >
  <table class="align table table-striped table-bordered table-hover table-condensed">
		<thead>
			<tr >
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
$num = 0;
$conn=mysql_connect("localhost","IEEE","IEEE2011")  or die("Could not connect: " . mysql_error());
mysql_select_db("IEEE",$conn);
mysql_query("SET NAMES UTF8",$conn); 
$sql= mysql_query("SELECT * FROM selectRlt WHERE 确定导师='$id'");
while($row = mysql_fetch_array($sql)){
	$num ++;
	echo "<tr>";
	echo "<td>".$num."</td>";
	$stid = $row['id'];
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
	echo "</tr>";           
}
mysql_close($conn);
?>        
			</tbody>		
		</table>
	</div>
      </table>
    </div>
    <script src="../assets/js/jquery-1.8.3.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
</body>
</html>

 
