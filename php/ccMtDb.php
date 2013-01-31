<?php
session_start();
if (isset($_SESSION['id'])){
	if($_SESSION['idtype']!='student'){
		session_destroy();
		exit(htmlspecialchars(json_encode(array('error'=>'iderror')),ENT_NOQUOTES));
	}
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
				echo htmlspecialchars(json_encode(array('error'=>'sqlerror')),ENT_NOQUOTES);
			}
			else{
				echo htmlspecialchars(json_encode(array('success'=>TRUE)),ENT_NOQUOTES);
			}
		}
		else{
			echo htmlspecialchars(json_encode(array('error'=>'statuserror')),ENT_NOQUOTES);
		}
	}
	elseif($row['导师二'] == $mtid){
		if($row['状态二'] == 1){
			$sql = "UPDATE selectRlt SET 导师二=null,状态二=0 WHERE id='$id' ";
			//mysql_query($sql, $conn);
			if (!mysql_query($sql, $conn)){
				echo htmlspecialchars(json_encode(array('error'=>'sqlerror')),ENT_NOQUOTES);
			}
			else{
				echo htmlspecialchars(json_encode(array('success'=>TRUE)),ENT_NOQUOTES);
			}
		}
		else{
			echo htmlspecialchars(json_encode(array('error'=>'statuserror')),ENT_NOQUOTES);
		}
	}
	elseif($row['导师三'] == $mtid){
		if($row['状态三'] == 1){
			$sql = "UPDATE selectRlt SET 导师三=null,状态三=0 WHERE id='$id' ";
			//mysql_query($sql, $conn);
			if (!mysql_query($sql, $conn)){
				echo htmlspecialchars(json_encode(array('error'=>'sqlerror')),ENT_NOQUOTES);
			}
			else{
				echo htmlspecialchars(json_encode(array('success'=>TRUE)),ENT_NOQUOTES);
			}
		}
		else{
			echo htmlspecialchars(json_encode(array('error'=>'statuserror')),ENT_NOQUOTES);
		}
	}
	else{
		echo htmlspecialchars(json_encode(array('error'=>'mentoriderror')),ENT_NOQUOTES);
	}
	mysql_close($conn);
}
else{
	echo htmlspecialchars(json_encode(array('error'=>'nologin')),ENT_NOQUOTES);
}
?> 
 
