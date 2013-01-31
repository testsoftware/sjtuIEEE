<?php
session_start();
if(isset($_SESSION['idtype'])){
	if($_SESSION['idtype'] == 'student'){
		$idtype = 1;
		$num = 0;
		$id = $_SESSION['id'];
		$conn=mysql_connect("localhost","IEEE","IEEE2011")  or die("Could not connect: " . mysql_error());
		mysql_select_db("IEEE",$conn);
		mysql_query("SET NAMES UTF8",$conn); 
		$sql= mysql_query("SELECT * FROM selectRlt WHERE id = '$id'");
		$row = mysql_fetch_assoc($sql);
		if(!empty($row['导师一'])){
			$mentor1id = $row['导师一'];
			$mentor1status = $row['状态一'];
			$num ++;
		}
		if(!empty($row['导师二'])){
			$mentor2id = $row['导师二'];
			$mentor2status = $row['状态二'];
			$num ++;
		}
		if(!empty($row['导师三'])){
			$mentor3id = $row['导师三'];
			$mentor3status = $row['状态三'];
			$num ++;
		}
		if(!empty($row['确定导师'])){
			$num = 4;
		}
		mysql_close($conn);
	}
	else{
		$idtype = 0;
	}	
}
else{
	$idtype = 0;
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
	$mtid = $_GET['mtid'];
	$conn=mysql_connect("localhost","IEEE","IEEE2011")  or die("Could not connect: " . mysql_error());
	mysql_select_db("IEEE",$conn);
	mysql_query("SET NAMES UTF8",$conn); 
	$sql= mysql_query("SELECT * FROM mentor where id='$mtid'");
	$row = mysql_fetch_assoc($sql);
        echo "<img src='../".$row['photo']."' width=200px; />";
	echo "工号:".$row['id'].'<br /> ';
	echo "专业:".$row['专业'].'<br />';
	echo "简介:".$row['简介'].'<br />';
	echo "email:".$row['email'].'<br />';
	echo "办公室:".$row['办公室'].'<br />';
	echo "<br /><br /><br />";						
	if($idtype != 0 and $num != 4){
		if(isset($mentor1id) and $mentor1id == $row['id']){
			$mentorid = $mentor1id;
			$status = $mentor1status;
		}
		elseif(isset($mentor2id) and $mentor2id == $row['id']){
			$mentorid = $mentor2id;
			$status = $mentor2status;
		}
		elseif(isset($mentor3id) and $mentor3id == $row['id']){
			$mentorid = $mentor3id;
			$status = $mentor3status;
		}
		else{
			$status = 0;
		}
		if($status == 0 and $num < 3){
			echo "<form action='sltMtDb.php' method='post'>";
			echo "<input type='hidden' name='mtid' value='".$row['id']."' />";
			echo "<input type='submit' value='选择' class='sltMtDb'/>";
			echo "</form>";
			echo "<br /><br /><br />";
		}
		elseif($status == 1){
			echo "等待导师确认;";
			echo "<form action='ccMtDb.php' method='post'>";
			echo "<input type='hidden' name='mtid' value='".$row['id']."' />";
			echo "<input type='submit' value='取消'  class='ccMtDb'  />";
			echo "</form>";
			echo "<br /><br /><br />";
		}
		elseif($status == 2){
			echo "导师已确认;";
			echo "<form action='rejectMtDb.php' method='post'>";
			echo "<input type='hidden' name='mtid' value='".$row['id']."' />";
			echo "<input type='submit' value='拒绝' class='rejectMtDb'/>";
			echo "</form>";
			echo "<form action='cfMtDb.php' method='post'>";
			echo "<input type='hidden' name='mtid' value='".$row['id']."' />";
			echo "<input type='submit' value='确认'  class='cfMtDb'/>";
			echo "</form>";
			echo "<br /><br /><br />";
		}
		elseif($status == 3){
			echo "双方已确认;";
		}
 	}
	if($_GET['fromurl'] == 'mentorlist'){
		echo "<button id='goback' > 返回</button>";
 	}
 	mysql_close($conn);
?>
<script src="../js/selectmt.js"></script>
<script>
$(document).ready(function(){
	$('#goback').click(function(){
		getmentortype($('#listtype').val());
	});
});
</script>
</body>
</html>
