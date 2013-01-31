<?php
session_start();
if(isset($_SESSION['id'])){
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
<title>Mentor</title>
</head>
<body>
<?php
	$stid = $_GET['stid'];
	$conn=mysql_connect("localhost","IEEE","IEEE2011")  or die("Could not connect: " . mysql_error());
	mysql_select_db("IEEE",$conn);
	mysql_query("SET NAMES UTF8",$conn); 
	$sql= mysql_query("SELECT * FROM student where id='$stid'");
	$row = mysql_fetch_assoc($sql);
        echo "<img src='../".$row['photo']."' width=200px; />";
	echo "学号:".$row['id'].'<br /> ';
// 	echo "简介:".$row['简介'].'<br />';
	echo "email:".$row['email'].'<br />';
	echo "<br /><br /><br />";						
	
	
	$sql= mysql_query("SELECT * FROM selectRlt WHERE id='$stid' ");
	$row = mysql_fetch_assoc($sql);
	
	if($row['导师一'] == $id){
		$status = $row['状态一'];
	}
	else{
		$status = $row['状态二'];
		
	}
	if($status == 1){
		echo "<form action='sltStDb.php' method='post'>";
		echo "<input type='hidden' name='stid' value='".$row['id']."' />";
		echo "<input type='submit' value='选择' />";
		echo "</form>";
		echo "<form action='ccStDb.php' method='post'>";
		echo "<input type='hidden' name='stid' value='".$row['id']."' />";
		echo "<input type='submit' value='拒绝' />";
		echo "</form>";
	}
	elseif($status == 2){
		echo "<form action='ccStDb.php' method='post'>";
		echo "<input type='hidden' name='stid' value='".$row['id']."' />";
		echo "<input type='submit' value='取消选择' />";
		echo "</form>";
	}
	elseif($status == 3){
		echo "双方已确认";
	}
	
	mysql_close($conn);
?>

</body>
</html>
