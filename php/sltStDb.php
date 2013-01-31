<?php
session_start();
function setstudent($stid,$id,$conn){
	$sql= mysql_query("SELECT * FROM selectRlt where id='$stid'",$conn);
	$row = mysql_fetch_assoc($sql);
	if ($row['导师一'] == $id){
		$sql = "UPDATE selectRlt SET 状态一=2 WHERE id='$stid' ";
		if (!mysql_query($sql, $conn)){
			echo "<script>alert('error');</script>";
			exit('error');
		}
		else{
			echo "<script>alert('成功!');</script>";
		}
	}
	elseif($row['导师二'] == $id){
		$sql = "UPDATE selectRlt SET 状态二=2 WHERE id='$stid' ";
		//mysql_query($sql, $conn);
		if (!mysql_query($sql, $conn)){
			echo "<script>alert('error');</script>";
			exit('error');
		}
		else{
		echo "<script>alert('成功!');</script>";
		}
	}
	elseif($row['导师三'] == $id){
		$sql = "UPDATE selectRlt SET 状态三=2 WHERE id='$stid' ";
		//mysql_query($sql, $conn);
		if (!mysql_query($sql, $conn)){
			echo "<script>alert('error');</script>";
			exit('error');
		}
		else{
			echo "<script>alert('成功!');</script>";
		}
	}
	else{
		echo "<script>alert('error');</script>";
		exit('error');
	}
}
if (isset($_SESSION['id'])){
	$id = $_SESSION['id'];
	$stid = $_POST['stid'];
	$conn = mysql_connect("localhost","IEEE","IEEE2011") or die("Could not connect:".mysql_error());
	mysql_select_db("IEEE",$conn);
	mysql_query("SET NAMES UTF8");
	
	$sql= mysql_query("SELECT * FROM mentorselectRlt where id='$id'");
	$row = mysql_fetch_assoc($sql);
	
	if (empty($row['学生一'])){
		$sql = "UPDATE mentorselectRlt SET 学生一='$stid',状态一=1 WHERE id='$id'";
		if (!mysql_query($sql, $conn)){
			echo "<script>alert('error');</script>";
			exit('error');
		}
		else{
			setstudent($stid,$id,$conn);
		}
	}
	elseif (empty($row['学生二'])){
		$sql = "UPDATE mentorselectRlt SET 学生二='$stid',状态二=1 WHERE id='$id'";
		if (!mysql_query($sql, $conn)){
			echo "<script>alert('error');</script>";
			exit('error');
		}
		else{
			setstudent($stid,$id,$conn);
		}
	}
	else{
		echo "<script>alert('已选2位待确认学生');</script>";
		exit('error');
	}
	echo "<script>window.location.href='sltRecordSt.php'</script>";	
	mysql_close($conn);
}
else{
	echo "<script>alert('请登录!');</script>";
	echo "<script>window.location.href='login.php'</script>";
}
?>