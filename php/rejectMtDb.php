<?php
session_start();
function rejectMt($mtid,$id,$mt1,$st1,$conn){
	$sql = mysql_query("SELECT * FROM mentorselectRlt where id='$mtid'");
	$rowmt = mysql_fetch_assoc($sql);
	$record = $rowmt['学生放弃记录'].'|'.$id;
	if($rowmt['学生一']==$id and $rowmt['状态一']<2){
		$sql = "UPDATE mentorselectRlt SET 学生一=null,状态一=0,学生放弃记录='$record' WHERE id='$mtid' ";
		mysql_query($sql, $conn);
		$sql = "UPDATE selectRlt SET ".$mt1."=null,".$st1."=0 WHERE id='$id' ";
			//mysql_query($sql, $conn);
		if (!mysql_query($sql, $conn)){
			echo "<script>alert('wrong');</script>";
		}
		else{
			echo "<script>alert('success!');</script>";
		}
	}
	elseif($rowmt['学生二']==$id and $rowmt['状态二']<2 ){
		$sql = "UPDATE mentorselectRlt SET 学生二=null,状态二=0,学生放弃记录='$record'  WHERE id='$mtid' ";
		mysql_query($sql, $conn);
		$sql = "UPDATE selectRlt SET ".$mt1."=null,".$st1."=0 WHERE id='$id' ";
			//mysql_query($sql, $conn);
		if (!mysql_query($sql, $conn)){
			echo "<script>alert('wrong');</script>";
		}
		else{
			echo "<script>alert('success!');</script>";
		}
	}
	else{
		echo "<script>alert('wrong');</script>";
		exit('wrong');
	}
}
if (isset($_SESSION['id'])){
	$id = $_SESSION['id'];
	$mtid = $_POST['mtid'];
	$conn = mysql_connect("localhost","IEEE","IEEE2011") or die("Could not connect:".mysql_error());
	mysql_select_db("IEEE",$conn);
	mysql_query("SET NAMES UTF8");
	$sql= mysql_query("SELECT * FROM selectRlt where id='$id'");
	$row = mysql_fetch_assoc($sql);
	if ($row['导师一'] == $mtid){
		if($row['状态一'] == 2){
			rejectMt($mtid,$id,'导师一','状态一',$conn);
		}
		else{
			echo "<script>alert('wrong');</script>";
		}
	}
	elseif($row['导师二'] == $mtid){
		if($row['状态二'] == 2){
			rejectMt($mtid,$id,'导师二','状态二',$conn);		
		}
		else{
			echo "<script>alert('wrong');</script>";
		}
	}
	elseif($row['导师三'] == $mtid){
		if($row['状态三'] == 2){
			rejectMt($mtid,$id,'导师三','状态三',$conn);		
		}
		else{
			echo "<script>alert('wrong');</script>";
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
 
 
