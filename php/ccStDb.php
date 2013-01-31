<?php
session_start();
function cancelstudent($id,$stid,$conn){
	$sql= mysql_query("SELECT * FROM mentorselectRlt where id='$id'",$conn);
	$row = mysql_fetch_assoc($sql);
	if($row['学生一']==$stid and $row['状态一']<2 ){
		$sql = "UPDATE mentorselectRlt SET 学生一=null,状态一=0 WHERE id='$id' ";
		mysql_query($sql, $conn);
	}
	elseif($row['学生二']==$stid and $row['状态二']<2){
		$sql = "UPDATE mentorselectRlt SET 学生二=null,状态二=0 WHERE id='$id' ";
		mysql_query($sql, $conn);
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
	$sql= mysql_query("SELECT * FROM selectRlt where id='$stid'");
	$row = mysql_fetch_assoc($sql);
	if ($row['导师一'] == $id and $row['状态一'] < 3){
		$sql = "UPDATE selectRlt SET 状态一=1 WHERE id='$stid' ";
		//mysql_query($sql, $conn);
		if (!mysql_query($sql, $conn)){
			echo "<script>alert('error');</script>";
			exit('error');
		}
		else{
			cancelstudent($id,$stid,$conn);
			echo "<script>alert('成功!');</script>";
		}
	}
	elseif($row['导师二'] == $id and $row['状态二'] < 3){
		$sql = "UPDATE selectRlt SET 状态二=1 WHERE id='$stid' ";
		//mysql_query($sql, $conn);
		if (!mysql_query($sql, $conn)){
			echo "<script>alert('error');</script>";
			exit('error');
		}
		else{
			cancelstudent($id,$stid,$conn);
			echo "<script>alert('成功!');</script>";
		}
	}
	elseif($row['导师三'] == $id and $row['状态三'] < 3){
		$sql = "UPDATE selectRlt SET 状态三=1 WHERE id='$stid' ";
		//mysql_query($sql, $conn);
		if (!mysql_query($sql, $conn)){
			echo "<script>alert('error');</script>";
			exit('error');
		}
		else{
			cancelstudent($id,$stid,$conn);
			echo "<script>alert('成功!');</script>";
		}
	}
	else{
		echo "<script>alert('error');</script>";
	}
	mysql_close($conn);
}
else{
	echo "<script>alert('请登录!');</script>";
	echo "<script>window.location.href='login.php'</script>";
}
?> 
