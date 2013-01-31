<?php
session_start();
function update($row,$mtid,$id,$conn,$mt2,$st2,$mt3,$st3){
	$sqlmentor = mysql_query("SELECT 学生一,学生二 FROM mentorselectRlt where id='$mtid'");
	$rowmentor = mysql_fetch_assoc($sqlmentor);
	if($rowmentor['学生一'] == $id){
		$sql = "UPDATE mentorselectRlt SET 状态一=2 WHERE id='$mtid'";
		if (!mysql_query($sql, $conn)){
			echo "<script>alert('失败');</script>";
			exit('error!');
		}
	}
	elseif($rowmentor['学生二'] == $id){
		$sql = "UPDATE mentorselectRlt SET 状态二=2 WHERE id='$mtid'";
		if (!mysql_query($sql, $conn)){
			echo "<script>alert('失败');</script>";
			exit('error!');
		}
	}
	else{
		echo "<script>alert('your mentor is invalid!');</script>";
		exit('your mentor is invalid!');
	}
	
// 		需要在导师的失败记录中添加信息如果状态为2
	if($row[$st2] == 2){
		$mtid2 = $row[$mt2];
		$sql = mysql_query("SELECT  学生一,学生二,学生放弃记录 FROM mentorselectRlt where id='$mtid2'");
		$rowmt = mysql_fetch_assoc($sql);
		$record = $rowmt['学生放弃记录'].'|'.$id;
		if($rowmt['学生一'] == $id){
			$sql = "UPDATE mentorselectRlt SET 学生一=null,状态一=0,学生放弃记录='$record' WHERE id='$mtid2'";
		}
		elseif($rowmt['学生二'] == $id){
			$sql = "UPDATE mentorselectRlt SET 学生二=null,状态二=0,学生放弃记录='$record' WHERE id='$mtid2'";
		}
		mysql_query($sql, $conn);
	}
	$sql = "UPDATE selectRlt SET ".$mt2."=null,".$st2."=0 WHERE id='$id'";
	mysql_query($sql, $conn);
	if($row[$st3] == 2){
		$mtid3 = $row[$mt3];
		$sql = mysql_query("SELECT 学生一,学生二,学生放弃记录 FROM mentor where id='$mtid3'");
		$rowmt = mysql_fetch_assoc($sql);
		$record = $rowmt['学生放弃记录'].'|'.$id;
		if($rowmt['学生一'] == $id){
			$sql = "UPDATE mentorselectRlt SET 学生一=null,状态一=0,学生放弃记录='$record' WHERE id='$mtid3'";
		}
		elseif($rowmt['学生二'] == $id){
			$sql = "UPDATE mentorselectRlt SET 学生二=null,状态二=0,学生放弃记录='$record' WHERE id='$mtid3'";
		}
		mysql_query($sql, $conn);
	}
	$sql = "UPDATE selectRlt SET ".$mt3."=null,".$st3."=0 WHERE id='$id' ";
	mysql_query($sql, $conn);
	echo "<script>alert('success!');</script>";
}


if (isset($_SESSION['id'])){
	$id = $_SESSION['id'];
	$mtid = $_POST['mtid'];
	$conn = mysql_connect("localhost","IEEE","IEEE2011") or die("Could not connect:".mysql_error());
	mysql_select_db("IEEE",$conn);
	mysql_query("SET NAMES UTF8");
	$sql= mysql_query("SELECT * FROM selectRlt where id='$id'");
	$row = mysql_fetch_assoc($sql);
	if($row['导师一'] == $mtid){
		if($row['状态一'] < 2){
			echo "<script>alert('wrong with your mentor status!');</script>";
			exit("failed!");
		}
		elseif($row['状态一'] == 2){
			$sql = "UPDATE selectRlt SET 确定导师='$mtid',状态一=3 WHERE id='$id' ";
			if (!mysql_query($sql, $conn)){
				echo "<script>alert('error');</script>";
				exit("error");
			}
			else{
				update($row,$mtid,$id,$conn,'导师二','状态二','导师三','状态三');
			}
		}
		else{
			echo "<script>alert('wrong');</script>";
		}
	}
	elseif($row['导师二'] == $mtid){
		if($row['状态二'] < 2){
			echo "<script>alert('wrong with your mentor status!');</script>";
			exit("failed!");
		}
		elseif($row['状态二'] == 2){
			$sql = "UPDATE selectRlt SET 确定导师='$mtid',状态二=3 WHERE id='$id' ";
			if (!mysql_query($sql, $conn)){
				echo "<script>alert('error');</script>";
				exit("error");
			}
			else{
				update($row,$mtid,$id,$conn,'导师一','状态一','导师三','状态三');
			}
		}
		else{
			echo "<script>alert('wrong');</script>";
		}
	}
	elseif($row['导师三'] == $mtid){
		if($row['状态三'] < 2){
			echo "<script>alert('wrong with your mentor status!');</script>";
			exit("failed!");
		}
		elseif($row['状态三'] == 2){
			$sql = "UPDATE selectRlt SET 确定导师='$mtid',状态三=3 WHERE id='$id' ";
			if (!mysql_query($sql, $conn)){
				echo "<script>alert('error');</script>";
				exit("error");
			}
			else{
				update($row,$mtid,$id,$conn,'导师二','状态二','导师一','状态一');
			}
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
 
