<?php
if($_GET['ISAJAX'] != 'AJAX' ) {
	exit('There are some mistakes in your request. Do not input links directly. Please get access to the page through your homepage!');
}
session_start();
if (isset($_SESSION['id'])){
	if($_SESSION['idtype']!='student'){
		session_destroy();
		exit('You have no authority to access this document,please login again');
	}
	$id = $_SESSION['id'];	
}
else{
	echo "<script>alert('请登录!');</script>";
	echo "<script>window.location.href='login.php'</script>";
	exit("error");
}
?>
<!DOCTYPE html >
<html lang='zh-CN'>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>record</title>
</head>
<body>
<?php
$conn=mysql_connect("localhost","IEEE","IEEE2011")  or die("Could not connect: " . mysql_error());
mysql_select_db("IEEE",$conn);
mysql_query("SET NAMES UTF8",$conn); 
$sql= mysql_query("SELECT 失败记录 FROM selectRlt where id='$id'");
$row = mysql_fetch_assoc($sql);
$record = explode('|',$row['失败记录']);
echo "<table class='table table-hover table-bordered'>";
echo "<tr><th>序号</th><th>工号</th></tr>";
while (list($key, $val) = each($record)){
  if(!empty($val)){
	echo "<tr><td>$key</td><td>$val</td></tr>";
  }
}
echo "</table>"
?>
</body>
</html>