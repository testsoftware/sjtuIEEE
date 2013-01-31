<?php
session_start();
if (isset($_SESSION['id'])){
	$id = $_SESSION['id'];
	$mtid = $_POST['mtid'];
	$conn = mysql_connect("localhost","IEEE","IEEE2011") or die("Could not connect:".mysql_error());
	mysql_select_db("IEEE",$conn);
	mysql_query("SET NAMES UTF8");
	$sql= mysql_query("SELECT * FROM selectRlt where id='$id'");
	$row = mysql_fetch_assoc($sql);
	if (empty($row['导师一'])){
		$sql = "UPDATE selectRlt SET 导师一='$mtid',状态一=1 WHERE id='$id' ";
		//mysql_query($sql, $conn);
		if (!mysql_query($sql, $conn)){
		echo "<script>alert('失败');</script>";
		}
		else{
		echo "<script>alert('成功!');</script>";
		}
	}
	elseif(empty($row['导师二'])){
		$sql = "UPDATE selectRlt SET 导师二='$mtid',状态二=1 WHERE id='$id' ";
		//mysql_query($sql, $conn);
		if (!mysql_query($sql, $conn)){
		echo "<script>alert('失败!');</script>";
		}
		else{
		echo "<script>alert('成功!');</script>";
		}
	}
	elseif(empty($row['导师三'])){
		$sql = "UPDATE selectRlt SET 导师三='$mtid',状态三=1 WHERE id='$id' ";
		//mysql_query($sql, $conn);
		if (!mysql_query($sql, $conn)){
		echo "<script>alert('失败!');</script>";
		}
		else{
		echo "<script>alert('成功!');</script>";
		}
	}
	else{
		echo "<script>alert('你已经选满3个导师');</script>";
	}
	mysql_close($conn);
}
else{
	echo "<script>alert('请登录!');</script>";
	echo "<script>window.location.href='login.php'</script>";
}


?>