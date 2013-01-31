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
	if ($row['导师一'] == $mtid){
		if($row['状态一'] == 1){
			$sql = "UPDATE selectRlt SET 导师一=null,状态一=0 WHERE id='$id' ";
			//mysql_query($sql, $conn);
			if (!mysql_query($sql, $conn)){
				echo "<script>alert('error');</script>";
			}
			else{
				echo "<script>alert('成功!');</script>";
			}
		}
		else{
			echo "<script>alert('wrong');</script>";
		}
	}
	elseif($row['导师二'] == $mtid){
		if($row['状态二'] == 1){
			$sql = "UPDATE selectRlt SET 导师二=null,状态二=0 WHERE id='$id' ";
			//mysql_query($sql, $conn);
			if (!mysql_query($sql, $conn)){
				echo "<script>alert('error');</script>";
			}
			else{
				echo "<script>alert('成功!');</script>";
			}
		}
		else{
			echo "<script>alert('wrong');</script>";
		}
	}
	elseif($row['导师三'] == $mtid){
		if($row['状态三'] == 1){
			$sql = "UPDATE selectRlt SET 导师三=null,状态三=0 WHERE id='$id' ";
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
	}
	else{
		echo "<script>alert('wrong');</script>";
	}
	mysql_close($conn);
}
else{
	echo "<script>alert('请登录!');</script>";
	echo "<script>window.location.href='login.php'</script>";
}
?> 
 
