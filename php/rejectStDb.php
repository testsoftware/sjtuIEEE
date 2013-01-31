<?php
session_start();
if (isset($_SESSION['id'])){
	$id = $_SESSION['id'];
	$stid = $_POST['stid'];
	$conn = mysql_connect("localhost","IEEE","IEEE2011") or die("Could not connect:".mysql_error());
	mysql_select_db("IEEE",$conn);
	mysql_query("SET NAMES UTF8");
	$sql= mysql_query("SELECT * FROM selectRlt where id='$stid'");
	$row = mysql_fetch_assoc($sql);
	if ($row['导师一'] == $id and $row['状态一'] < 3){
		$record = $row['失败记录'].'|'.$id;
		$sql = "UPDATE selectRlt SET 导师一=null,状态一=0,失败记录='$record' WHERE id='$stid' ";
		if (!mysql_query($sql, $conn)){
			echo "<script>alert('error');</script>";
		}
		else{
			echo "<script>alert('成功!');</script>";
		}
	}
	elseif($row['导师二'] == $id and $row['状态二'] < 3){
		$record = $row['失败记录'].'|'.$id;
		$sql = "UPDATE selectRlt SET 导师二=null,状态二=0,失败记录='$record' WHERE id='$stid' ";
		//mysql_query($sql, $conn);
		if (!mysql_query($sql, $conn)){
			echo "<script>alert('error');</script>";
		}
		else{
			echo "<script>alert('成功!');</script>";
		}
	}
	elseif($row['导师三'] == $id and $row['状态三'] < 3){
		$record = $row['失败记录'].'|'.$id;
		$sql = "UPDATE selectRlt SET 导师三=null,状态三=0,失败记录='$record' WHERE id='$stid' ";
		//mysql_query($sql, $conn);
		if (!mysql_query($sql, $conn)){
		echo "<script>alert('error');</script>";
		}
		else{
		echo "<script>alert('成功!');</script>";
		}
	}
	else{
		echo "<script>alert('error');</script>";
	}
	echo "<script>window.location.href='sltRecordSt.php'</script>";	
	mysql_close($conn);
}
else{
	echo "<script>alert('请登录!');</script>";
	echo "<script>window.location.href='login.php'</script>";
}
?> 
 
