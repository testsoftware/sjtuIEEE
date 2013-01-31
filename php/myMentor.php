<?php
session_start();
if(isset($_SESSION['id'])){
	$id = $_SESSION['id'];
	$username = $_SESSION['username'];
	$conn=mysql_connect("localhost","IEEE","IEEE2011")  or die("Could not connect: " . mysql_error());
	mysql_select_db("IEEE",$conn);
	mysql_query("SET NAMES UTF8",$conn); 
	$sql= mysql_query("SELECT 确定导师 FROM selectRlt WHERE id = '$id'");
	$row = mysql_fetch_assoc($sql);
	if(!empty($row['确定导师'])){
		$mtid = $row['确定导师'];
	}
	else{
		$mtid = 0;
	}
	mysql_close($conn);
}
else{
	echo "<script>alert('请登录!');</script>";
	echo "<script>window.location.href='login.php'</script>";
}	
?>
<!DOCTYPE html>
<html  lang='zh-CN'>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $username; ?></title> 
</head>
<body>
<?php
if($mtid != 0){
	$conn=mysql_connect("localhost","IEEE","IEEE2011")  or die("Could not connect: " . mysql_error());
	mysql_select_db("IEEE",$conn);
	mysql_query("SET NAMES UTF8",$conn); 
	$sql= mysql_query("SELECT * FROM mentor where id='$mtid'");
	$row = mysql_fetch_assoc($sql);
        echo "<img src='../".$row['photo']."'/>";
	echo "工号:".$row['id'].'<br /> ';
	echo "专业:".$row['专业'].'<br />';
	echo "简介:".$row['简介'].'<br />';
	echo "email:".$row['email'].'<br />';
	echo "办公室:".$row['办公室'].'<br />';
	echo "<br /><br /><br />";						
	mysql_close($conn);
}
else{
	echo "你还没有确定导师,请尽快决定!";
}
?>


</body>
</html>